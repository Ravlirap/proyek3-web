<?php

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use RuntimeException;

/**
 * AIFoodScanService
 *
 * Bertanggung jawab mengirim gambar makanan ke FastAPI AI service
 * dan mengembalikan data nutrisi hasil deteksi dalam format array PHP.
 *
 * ┌──────────────────────────────────────────────────────────────┐
 * │  Laravel  ──[multipart/form-data]──►  FastAPI /analyze-food  │
 * │           ◄──────────[JSON]──────────                        │
 * └──────────────────────────────────────────────────────────────┘
 */
class AIFoodScanService
{
    /** Endpoint FastAPI yang akan dihubungi. */
    private string $endpoint;

    /** Timeout request dalam detik. */
    private int $timeout;

    /** Nama field file saat multipart upload ke FastAPI. */
    private const FILE_FIELD = 'image';

    public function __construct()
    {
        // Nilai default bisa di-override lewat .env → lihat config/services.php
        $this->endpoint = config('services.ai_food_scan.endpoint', 'http://192.168.61.33:8000/analyze-food');
        $this->timeout  = (int) config('services.ai_food_scan.timeout', 30);
    }

    // ────────────────────────────────────────────────────────────────────────
    // PUBLIC API
    // ────────────────────────────────────────────────────────────────────────

    /**
     * Analisa gambar makanan menggunakan FastAPI AI.
     *
     * @param  string  $imagePath  Absolute path ke file gambar yang sudah di-upload.
     * @return array{
     *   foods: array<int, array{
     *     name: string,
     *     calories: float,
     *     protein: float,
     *     carbs: float,
     *     fat: float,
     *     estimated_portion_grams: float
     *   }>
     * }
     *
     * @throws RuntimeException  Bila file tidak ditemukan, AI service tidak tersedia,
     *                           timeout, atau response tidak valid.
     */
    public function analyze(string $imagePath): array
    {
        $this->ensureFileExists($imagePath);

        Log::info('[AIFoodScanService] Mengirim gambar ke FastAPI.', [
            'endpoint'   => $this->endpoint,
            'image_path' => $imagePath,
        ]);

        $response = $this->sendRequest($imagePath);

        $this->validateResponse($response);

        $foods = $response['data']['foods'];

        Log::info('[AIFoodScanService] AI berhasil mendeteksi makanan.', [
            'jumlah_item' => count($foods),
            'items'       => array_column($foods, 'name'),
        ]);

        return ['foods' => $foods];
    }

    // ────────────────────────────────────────────────────────────────────────
    // PRIVATE HELPERS
    // ────────────────────────────────────────────────────────────────────────

    /**
     * Pastikan file gambar benar-benar ada sebelum dikirim.
     *
     * @throws RuntimeException
     */
    private function ensureFileExists(string $imagePath): void
    {
        if (! file_exists($imagePath)) {
            throw new RuntimeException(
                "File gambar tidak ditemukan: {$imagePath}"
            );
        }
    }

    /**
     * Kirim multipart HTTP request ke FastAPI dan kembalikan body sebagai array.
     *
     * @return array<string, mixed>
     *
     * @throws RuntimeException
     */
    private function sendRequest(string $imagePath): array
    {
        try {
            $response = Http::timeout($this->timeout)
                ->attach(
                    self::FILE_FIELD,           // nama field di FastAPI
                    file_get_contents($imagePath),
                    basename($imagePath)        // nama file yang dikirim
                )
                ->post($this->endpoint);

            // HTTP 4xx / 5xx dari FastAPI
            if ($response->failed()) {
                Log::error('[AIFoodScanService] FastAPI mengembalikan error HTTP.', [
                    'status' => $response->status(),
                    'body'   => $response->body(),
                ]);

                throw new RuntimeException(
                    "AI service mengembalikan HTTP {$response->status()}. "
                    . "Pastikan FastAPI berjalan di: {$this->endpoint}"
                );
            }

            return $response->json() ?? [];

        } catch (ConnectionException $e) {
            // FastAPI tidak bisa dijangkau (mati / salah IP / port)
            Log::error('[AIFoodScanService] Tidak dapat terhubung ke FastAPI.', [
                'endpoint' => $this->endpoint,
                'error'    => $e->getMessage(),
            ]);

            throw new RuntimeException(
                "Tidak dapat terhubung ke AI service ({$this->endpoint}). "
                . 'Periksa apakah FastAPI sudah berjalan dan IP/port benar.'
            );

        } catch (RequestException $e) {
            // Timeout atau error level request lainnya
            Log::error('[AIFoodScanService] Request ke FastAPI gagal.', [
                'error' => $e->getMessage(),
            ]);

            throw new RuntimeException(
                "Request ke AI service gagal: {$e->getMessage()}"
            );
        }
    }

    /**
     * Validasi struktur JSON yang dikembalikan FastAPI.
     *
     * Struktur yang diharapkan:
     * {
     *   "success": true,
     *   "data": {
     *     "foods": [
     *       { "name": "...", "calories": 0, "protein": 0, "carbs": 0, "fat": 0, "estimated_portion_grams": 0 }
     *     ]
     *   }
     * }
     *
     * @param  array<string, mixed>  $response
     *
     * @throws RuntimeException
     */
    private function validateResponse(array $response): void
    {
        // 1. Field "success" harus ada dan bernilai true
        if (! isset($response['success']) || $response['success'] !== true) {
            $aiMessage = $response['message'] ?? 'Tidak ada pesan dari AI.';
            throw new RuntimeException(
                "AI service melaporkan kegagalan: {$aiMessage}"
            );
        }

        // 2. Field "data" harus berupa array
        if (! isset($response['data']) || ! is_array($response['data'])) {
            throw new RuntimeException(
                'Response AI tidak valid: field "data" tidak ditemukan atau bukan array.'
            );
        }

        // 3. Field "data.foods" harus berupa array dan tidak kosong
        if (
            ! isset($response['data']['foods'])
            || ! is_array($response['data']['foods'])
            || count($response['data']['foods']) === 0
        ) {
            throw new RuntimeException(
                'AI tidak berhasil mendeteksi makanan apapun dari gambar yang diberikan.'
            );
        }

        // 4. Setiap item dalam foods harus memiliki kolom wajib
        $requiredKeys = ['name', 'calories', 'protein', 'carbs', 'fat', 'estimated_portion_grams'];

        foreach ($response['data']['foods'] as $index => $food) {
            foreach ($requiredKeys as $key) {
                if (! array_key_exists($key, $food)) {
                    throw new RuntimeException(
                        "Response AI tidak valid: item foods[{$index}] tidak memiliki field \"{$key}\"."
                    );
                }
            }
        }
    }
}
