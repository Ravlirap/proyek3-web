<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ScanFood;
use App\Models\ScanSession;
use App\Services\AIFoodScanService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use RuntimeException;
use Throwable;

class ScanController extends Controller
{
    public function __construct(
        private readonly AIFoodScanService $aiService
    ) {}

    /*
    |--------------------------------------------------------------------------
    | POST /api/scan
    |--------------------------------------------------------------------------
    | Flow:
    |   1. Validasi request  (image file, user_id optional)
    |   2. Simpan gambar ke  storage/app/public/scan/
    |   3. Kirim gambar ke FastAPI → terima daftar makanan + nutrisi
    |   4. Hitung total nutrisi dari semua item yang terdeteksi
    |   5. Simpan scan_sessions & scan_foods dalam satu transaksi DB
    |   6. Return JSON response
    */

    /**
     * Proses scan gambar makanan via FastAPI AI.
     */
    public function scan(Request $request): JsonResponse
    {
        // ─── 1. Validasi ─────────────────────────────────────────────────────
        try {
            $validated = $request->validate([
                'image'   => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'], // maks 10 MB
                'user_id' => ['nullable', 'integer', 'exists:users,id'],
            ]);
        } catch (ValidationException $e) {
            return $this->errorResponse(
                message: 'Validasi gagal.',
                errors:  $e->errors(),
                status:  422
            );
        }

        DB::beginTransaction();

        try {
            // ─── 2. Upload & simpan gambar ───────────────────────────────────
            $imageFile  = $request->file('image');
            $filename   = Str::uuid() . '.' . $imageFile->getClientOriginalExtension();
            $storedPath = $imageFile->storeAs('scan', $filename, 'public');
            $imageUrl   = Storage::disk('public')->url($storedPath);
            $absolutePath = Storage::disk('public')->path($storedPath);

            // ─── 3. Kirim ke FastAPI AI ──────────────────────────────────────
            $aiResult = $this->aiService->analyze($absolutePath);
            // $aiResult = [ 'foods' => [ ['name'=>..., 'calories'=>..., ...], ... ] ]

            $foods = $aiResult['foods'];

            // ─── 4. Hitung total nutrisi dari semua item ─────────────────────
            $totalCalories = 0;
            $totalProtein  = 0;
            $totalCarbs    = 0;
            $totalFat      = 0;

            foreach ($foods as $food) {
                $totalCalories += (float) $food['calories'];
                $totalProtein  += (float) $food['protein'];
                $totalCarbs    += (float) $food['carbs'];
                $totalFat      += (float) $food['fat'];
            }

            // ─── 5. Simpan ke database ───────────────────────────────────────
            $scanSession = ScanSession::create([
                'user_id'        => $validated['user_id'] ?? null,
                'image_path'     => $storedPath,
                'total_calories' => round($totalCalories, 2),
                'total_protein'  => round($totalProtein,  2),
                'total_carbs'    => round($totalCarbs,    2),
                'total_fat'      => round($totalFat,      2),
            ]);

            // Simpan setiap makanan yang terdeteksi ke scan_foods
            $savedFoods = [];
            foreach ($foods as $food) {
                $scanFood = ScanFood::create([
                    'scan_session_id'         => $scanSession->id,
                    'food_name'               => $food['name'],
                    'calories'                => round((float) $food['calories'], 2),
                    'protein'                 => round((float) $food['protein'],  2),
                    'carbs'                   => round((float) $food['carbs'],    2),
                    'fat'                     => round((float) $food['fat'],      2),
                    'estimated_portion_grams' => round((float) $food['estimated_portion_grams'], 2),
                ]);

                $savedFoods[] = [
                    'food_name'               => $scanFood->food_name,
                    'calories'                => $scanFood->calories,
                    'protein'                 => $scanFood->protein,
                    'carbs'                   => $scanFood->carbs,
                    'fat'                     => $scanFood->fat,
                    'estimated_portion_grams' => $scanFood->estimated_portion_grams,
                ];
            }

            DB::commit();

            // ─── 6. Response JSON ────────────────────────────────────────────
            return $this->successResponse(
                message: 'Scan berhasil.',
                data: [
                    'scan_session_id' => $scanSession->id,
                    'image_url'       => $imageUrl,
                    'foods'           => $savedFoods,
                    'total_nutrition' => [
                        'calories' => round($totalCalories, 2),
                        'protein'  => round($totalProtein,  2),
                        'carbs'    => round($totalCarbs,    2),
                        'fat'      => round($totalFat,      2),
                    ],
                ]
            );

        } catch (RuntimeException $e) {
            // Error dari AIFoodScanService (timeout, invalid response, dsb.)
            DB::rollBack();
            Log::warning('ScanController@scan AIService error: ' . $e->getMessage());

            // Hapus file gambar yang sudah ter-upload jika AI gagal
            if (isset($storedPath)) {
                Storage::disk('public')->delete($storedPath);
            }

            return $this->errorResponse(
                message: $e->getMessage(),
                errors:  ['ai_service' => $e->getMessage()],
                status:  503
            );

        } catch (Throwable $e) {
            DB::rollBack();
            Log::error('ScanController@scan unexpected error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            if (isset($storedPath)) {
                Storage::disk('public')->delete($storedPath);
            }

            return $this->errorResponse(
                message: 'Terjadi kesalahan internal saat memproses scan.',
                errors:  ['server' => $e->getMessage()],
                status:  500
            );
        }
    }

    /*
    |--------------------------------------------------------------------------
    | GET /api/scan/history
    |--------------------------------------------------------------------------
    | Query param: user_id (required)
    | Mengembalikan riwayat sesi scan beserta daftar makanan yang terdeteksi.
    */

    /**
     * Ambil riwayat sesi scan milik seorang user.
     */
    public function history(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'user_id' => ['required', 'integer', 'exists:users,id'],
            ]);
        } catch (ValidationException $e) {
            return $this->errorResponse('Validasi gagal.', $e->errors(), 422);
        }

        $sessions = ScanSession::with('scanFoods')
            ->where('user_id', $validated['user_id'])
            ->latest()
            ->paginate(15);

        $mapped = $sessions->getCollection()->map(fn (ScanSession $session) => [
            'scan_session_id' => $session->id,
            'image_url'       => Storage::disk('public')->url($session->image_path),
            'total_nutrition' => [
                'calories' => $session->total_calories,
                'protein'  => $session->total_protein,
                'carbs'    => $session->total_carbs,
                'fat'      => $session->total_fat,
            ],
            'foods'      => $session->scanFoods->map(fn (ScanFood $f) => [
                'food_name'               => $f->food_name,
                'calories'                => $f->calories,
                'protein'                 => $f->protein,
                'carbs'                   => $f->carbs,
                'fat'                     => $f->fat,
                'estimated_portion_grams' => $f->estimated_portion_grams,
            ]),
            'scanned_at' => $session->created_at->toIso8601String(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Riwayat scan berhasil diambil.',
            'data'    => $mapped,
            'meta'    => [
                'current_page' => $sessions->currentPage(),
                'last_page'    => $sessions->lastPage(),
                'total'        => $sessions->total(),
            ],
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    private function successResponse(string $message, array $data = [], int $status = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ], $status);
    }

    private function errorResponse(string $message, array $errors = [], int $status = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors'  => $errors,
        ], $status);
    }
}
