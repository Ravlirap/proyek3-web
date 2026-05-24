<?php

namespace App\Http\Controllers\API;

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

class FoodScanController extends Controller
{
    public function __construct(
        private readonly AIFoodScanService $aiService
    ) {}

    /*
    |--------------------------------------------------------------------------
    | POST /api/food-scan
    |--------------------------------------------------------------------------
    |
    | Flow:
    |   1. Validate image (type, size)
    |   2. Store image → storage/app/public/scans/
    |   3. Send image to FastAPI via AIFoodScanService
    |   4. Receive AI result (foods array with nutrition data)
    |   5. Calculate nutrition totals
    |   6. Save to scan_sessions
    |   7. Save each food to scan_foods
    |   8. Return final JSON response
    |
    */

    /**
     * Scan makanan dari gambar yang di-upload.
     */
    public function scan(Request $request): JsonResponse
    {
        // ─── STEP 1 : Validasi ────────────────────────────────────────────────
        try {
            $request->validate([
                'image' => [
                    'required',
                    'file',
                    'image',                            // harus berupa gambar
                    'mimes:jpg,jpeg,png,webp',          // format yang diterima
                    'max:10240',                        // maks 10 MB
                ],
            ]);
        } catch (ValidationException $e) {
            return $this->fail(
                message: 'Gambar tidak valid.',
                errors:  $e->errors(),
                status:  422
            );
        }

        $storedPath = null;

        DB::beginTransaction();

        try {
            // ─── STEP 2 : Simpan gambar ke storage/app/public/scans/ ──────────
            $file       = $request->file('image');
            $filename   = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $storedPath = $file->storeAs('scans', $filename, 'public');
            $imageUrl   = Storage::disk('public')->url($storedPath);
            $absPath    = Storage::disk('public')->path($storedPath);

            // ─── STEP 3 : Kirim ke FastAPI AI ────────────────────────────────
            // AIFoodScanService melempar RuntimeException pada:
            //   - koneksi gagal (FastAPI unavailable)
            //   - timeout
            //   - response bukan JSON valid / malformed
            //   - success: false dari FastAPI
            $aiResult = $this->aiService->analyze($absPath);

            // ─── STEP 4 : Terima hasil AI ─────────────────────────────────────
            // Format: ['foods' => [['name', 'calories', 'protein', 'carbs', 'fat', 'estimated_portion_grams'], ...]]
            $foods = $aiResult['foods'];

            // ─── STEP 5 : Hitung total nutrisi ───────────────────────────────
            $totals = array_reduce($foods, function (array $carry, array $food): array {
                $carry['calories'] += (float) ($food['calories'] ?? 0);
                $carry['protein']  += (float) ($food['protein']  ?? 0);
                $carry['carbs']    += (float) ($food['carbs']    ?? 0);
                $carry['fat']      += (float) ($food['fat']      ?? 0);
                return $carry;
            }, ['calories' => 0.0, 'protein' => 0.0, 'carbs' => 0.0, 'fat' => 0.0]);

            // ─── STEP 6 : Simpan scan_sessions ───────────────────────────────
            $session = ScanSession::create([
                'user_id'        => auth()->id(),           // null jika guest
                'image_path'     => $storedPath,
                'total_calories' => round($totals['calories'], 2),
                'total_protein'  => round($totals['protein'],  2),
                'total_carbs'    => round($totals['carbs'],    2),
                'total_fat'      => round($totals['fat'],      2),
            ]);

            // ─── STEP 7 : Simpan scan_foods ──────────────────────────────────
            $savedFoods = [];

            foreach ($foods as $food) {
                ScanFood::create([
                    'scan_session_id'         => $session->id,
                    'food_name'               => $food['name'],
                    'calories'                => round((float) ($food['calories']                ?? 0), 2),
                    'protein'                 => round((float) ($food['protein']                 ?? 0), 2),
                    'carbs'                   => round((float) ($food['carbs']                   ?? 0), 2),
                    'fat'                     => round((float) ($food['fat']                     ?? 0), 2),
                    'estimated_portion_grams' => round((float) ($food['estimated_portion_grams'] ?? 100), 2),
                ]);

                $savedFoods[] = [
                    'food_name'               => $food['name'],
                    'calories'                => round((float) ($food['calories']                ?? 0), 2),
                    'protein'                 => round((float) ($food['protein']                 ?? 0), 2),
                    'carbs'                   => round((float) ($food['carbs']                   ?? 0), 2),
                    'fat'                     => round((float) ($food['fat']                     ?? 0), 2),
                    'estimated_portion_grams' => round((float) ($food['estimated_portion_grams'] ?? 100), 2),
                ];
            }

            DB::commit();

            // ─── STEP 8 : Return final JSON response ──────────────────────────
            return response()->json([
                'success'    => true,
                'session_id' => $session->id,
                'image_url'  => $imageUrl,
                'foods'      => $savedFoods,
                'totals'     => [
                    'calories' => round($totals['calories'], 2),
                    'protein'  => round($totals['protein'],  2),
                    'carbs'    => round($totals['carbs'],    2),
                    'fat'      => round($totals['fat'],      2),
                ],
            ], 200);

        } catch (RuntimeException $e) {
            // ── Error dari AIFoodScanService ──────────────────────────────────
            // Mencakup: FastAPI unavailable, timeout, malformed JSON, AI failure
            DB::rollBack();
            $this->cleanupFile($storedPath);

            Log::warning('[FoodScanController] AI service error.', [
                'message' => $e->getMessage(),
            ]);

            return $this->fail(
                message: $e->getMessage(),
                errors:  ['ai_service' => $e->getMessage()],
                status:  503
            );

        } catch (Throwable $e) {
            // ── Error tidak terduga (DB, dsb.) ────────────────────────────────
            DB::rollBack();
            $this->cleanupFile($storedPath);

            Log::error('[FoodScanController] Unexpected error.', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);

            return $this->fail(
                message: 'Terjadi kesalahan internal. Silakan coba lagi.',
                errors:  ['server' => $e->getMessage()],
                status:  500
            );
        }
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Private Helpers
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Hapus file gambar dari storage jika proses gagal,
     * supaya tidak ada file orphan tertinggal.
     */
    private function cleanupFile(?string $storedPath): void
    {
        if ($storedPath && Storage::disk('public')->exists($storedPath)) {
            Storage::disk('public')->delete($storedPath);
        }
    }

    /**
     * Format error response yang konsisten.
     */
    private function fail(string $message, array $errors = [], int $status = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors'  => $errors,
        ], $status);
    }
}
