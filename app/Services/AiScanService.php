<?php

namespace App\Services;

use App\Models\Food;

/**
 * AiScanService
 *
 * Simulasi layanan AI deteksi makanan.
 * Pada fase produksi, ganti method predict() dengan HTTP call
 * ke external Python / ML API yang sesungguhnya.
 *
 * Contoh integrasi produksi:
 *   $response = Http::attach('image', $imageContent, 'photo.jpg')
 *               ->post(config('services.ai.endpoint'));
 *   return $response->json();
 */
class AiScanService
{
    /**
     * Prediksi makanan dari gambar yang di-upload.
     *
     * @param  string  $imagePath  Path absolut file gambar (belum dipakai di mode dummy)
     * @return array{food: Food, confidence: float}
     *
     * @throws \RuntimeException bila tidak ada data makanan di database
     */
    public function predict(string $imagePath): array
    {
        // ── DUMMY MODE ────────────────────────────────────────────────────────
        // Ambil satu makanan secara acak dari tabel foods.
        // Simulasi confidence antara 0.75 – 0.99.
        // ─────────────────────────────────────────────────────────────────────
        $food = Food::inRandomOrder()->firstOrFail();

        $confidence = round(mt_rand(75, 99) / 100, 2);

        return [
            'food'       => $food,
            'confidence' => $confidence,
        ];

        // ── CONTOH INTEGRASI REAL AI ──────────────────────────────────────────
        // $imageContent = file_get_contents($imagePath);
        //
        // $response = \Illuminate\Support\Facades\Http::attach(
        //     'image', $imageContent, basename($imagePath)
        // )->post(config('services.ai.endpoint'));
        //
        // $aiData = $response->json();  // { "label": "Nasi Goreng", "confidence": 0.92 }
        //
        // $food = Food::where('name', 'like', '%' . $aiData['label'] . '%')
        //             ->firstOrFail();
        //
        // return [
        //     'food'       => $food,
        //     'confidence' => $aiData['confidence'],
        // ];
        // ─────────────────────────────────────────────────────────────────────
    }
}
