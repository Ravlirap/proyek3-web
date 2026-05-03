<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ScanDetail;
use App\Models\ScanSession;
use App\Models\User;
use App\Services\AiScanService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Throwable;

class ScanController extends Controller
{
    public function __construct(
        private readonly AiScanService $aiService
    ) {}

    /*
    |--------------------------------------------------------------------------
    | POST /api/scan
    |--------------------------------------------------------------------------
    | Flow:
    |   1. Validasi request  (image + user_id)
    |   2. Simpan gambar ke  storage/app/public/scan/
    |   3. Panggil AI service → { food, confidence }
    |   4. Hitung nutrisi & kalori berdasarkan default_portion_grams
    |   5. Simpan scan_sessions  &  scan_details  dalam satu transaksi DB
    |   6. Return JSON response
    */

    /**
     * Proses scan gambar makanan.
     */
    public function scan(Request $request): JsonResponse
    {
        // ─── 1. Validasi ─────────────────────────────────────────────────────
        try {
            $validated = $request->validate([
                'image'   => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'], // maks 5 MB
                'user_id' => ['required', 'integer', 'exists:users,id'],
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
            $imageFile = $request->file('image');
            $filename  = Str::uuid() . '.' . $imageFile->getClientOriginalExtension();

            // Disimpan di storage/app/public/scan/ → bisa diakses via /storage/scan/
            $storedPath = $imageFile->storeAs('scan', $filename, 'public');

            // URL yang bisa diakses publik
            $imageUrl = Storage::disk('public')->url($storedPath);

            // ─── 3. Simulasi AI ──────────────────────────────────────────────
            $absolutePath = Storage::disk('public')->path($storedPath);
            $prediction   = $this->aiService->predict($absolutePath);

            /** @var \App\Models\Food $food */
            $food       = $prediction['food'];
            $confidence = $prediction['confidence'];

            // ─── 4. Hitung nutrisi berdasarkan porsi default ─────────────────
            // Semua nilai nutrisi di tabel foods diasumsikan per 100 g.
            // Kalori aktual = (default_portion_grams / 100) * calories
            $porsiGram    = (float) $food->default_portion_grams;
            $multiplier   = $porsiGram / 100;

            $kalori       = round($food->calories * $multiplier, 2);
            $protein      = round($food->protein   * $multiplier, 2);
            $lemak        = round($food->fat        * $multiplier, 2);
            $karbohidrat  = round($food->carbs      * $multiplier, 2);

            // ─── 5. Simpan ke database ───────────────────────────────────────
            $scanSession = ScanSession::create([
                'user_id'      => $validated['user_id'],
                'image_path'   => $storedPath,
                'total_kalori' => $kalori,
                'confidence'   => $confidence,
            ]);

            ScanDetail::create([
                'scan_session_id' => $scanSession->id,
                'food_id'         => $food->id,
                'jumlah_gram'     => $porsiGram,
                'total_kalori'    => $kalori,
            ]);

            DB::commit();

            // ─── 6. Response JSON ────────────────────────────────────────────
            return $this->successResponse(
                message: 'Scan berhasil',
                data: [
                    'scan_session_id' => $scanSession->id,
                    'nama_makanan'    => $food->name,
                    'confidence'      => $confidence,
                    'kalori'          => $kalori,
                    'protein'         => $protein,
                    'lemak'           => $lemak,
                    'karbohidrat'     => $karbohidrat,
                    'porsi_gram'      => $porsiGram,
                    'image_url'       => $imageUrl,
                ]
            );

        } catch (Throwable $e) {
            DB::rollBack();
            Log::error('ScanController@scan error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            return $this->errorResponse(
                message: 'Terjadi kesalahan saat memproses scan.',
                errors:  ['server' => $e->getMessage()],
                status:  500
            );
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Riwayat scan milik user
    |--------------------------------------------------------------------------
    | GET /api/scan/history?user_id=1
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

        $sessions = ScanSession::with(['scanDetails.food'])
            ->where('user_id', $validated['user_id'])
            ->latest()
            ->paginate(15);

        $mapped = $sessions->getCollection()->map(function (ScanSession $session) {
            $detail = $session->scanDetails->first();
            $food   = $detail?->food;

            return [
                'scan_session_id' => $session->id,
                'nama_makanan'    => $food?->name ?? 'Tidak diketahui',
                'confidence'      => $session->confidence,
                'kalori'          => $session->total_kalori,
                'image_url'       => Storage::disk('public')->url($session->image_path),
                'scanned_at'      => $session->created_at->toIso8601String(),
            ];
        });

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
    | Helper – format JSON response
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
