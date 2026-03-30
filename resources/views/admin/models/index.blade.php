@extends('layouts.admin')

@section('title', 'Model AI')

@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-900">Manajemen Model AI</h2>
    <p class="text-gray-500 text-sm mt-1">Atur versi model Deep Learning yang digunakan dalam produksi.</p>
</div>

<!-- Active Model Widget -->
<div class="bg-gradient-to-r from-primary-800 to-primary-600 rounded-2xl shadow-lg p-6 mb-8 text-white relative overflow-hidden">
    <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-white opacity-10 rounded-full blur-2xl"></div>
    <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <span class="bg-primary-400 text-primary-950 text-xs px-2 py-0.5 rounded animate-pulse font-bold">LIVE</span>
                <span class="text-primary-100 font-medium text-sm">Model Produsksi Aktif</span>
            </div>
            <h3 class="text-3xl font-bold tracking-tight mb-1">YOLOv8-NutriSense-v2.1</h3>
            <p class="text-primary-100 max-w-xl text-sm leading-relaxed">Model terbaru dengan peningkatan akurasi pada makanan berkuah dan jajanan tradisional Indonesia.</p>
        </div>
        <div class="flex gap-4 items-center">
            <div class="text-center bg-black/20 rounded-xl p-3 border border-white/10 backdrop-blur-sm">
                <p class="text-3xl font-black">94.8%</p>
                <p class="text-[10px] text-primary-200 uppercase font-bold tracking-wider mt-1">Mean mAP</p>
            </div>
            <div class="text-center bg-black/20 rounded-xl p-3 border border-white/10 backdrop-blur-sm">
                <p class="text-3xl font-black">28ms</p>
                <p class="text-[10px] text-primary-200 uppercase font-bold tracking-wider mt-1">Avg Latency</p>
            </div>
        </div>
    </div>
</div>

<h3 class="text-lg font-bold text-gray-900 mb-4">Riwayat Versi Model</h3>
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-100">
            <tr>
                <th scope="col" class="px-6 py-4">Nama Versi</th>
                <th scope="col" class="px-6 py-4">Tgl Rilis</th>
                <th scope="col" class="px-6 py-4">Akurasi (mAP)</th>
                <th scope="col" class="px-6 py-4">Status</th>
                <th scope="col" class="px-6 py-4 text-right">Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-primary-50 border-b border-gray-100">
                <td class="px-6 py-4 font-bold text-primary-900">YOLOv8-NutriSense-v2.1</td>
                <td class="px-6 py-4">25 Mar 2026</td>
                <td class="px-6 py-4 font-medium text-gray-900">94.8%</td>
                <td class="px-6 py-4">
                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded border border-green-200">Aktif</span>
                </td>
                <td class="px-6 py-4 text-right">
                    <button class="text-gray-400 cursor-not-allowed text-xs" disabled>Rollback</button>
                </td>
            </tr>
            <tr class="bg-white border-b border-gray-50 hover:bg-gray-50">
                <td class="px-6 py-4 font-medium text-gray-900">YOLOv8-NutriSense-v2.0</td>
                <td class="px-6 py-4">10 Feb 2026</td>
                <td class="px-6 py-4">91.2%</td>
                <td class="px-6 py-4">
                    <span class="bg-gray-100 text-gray-600 text-xs font-medium px-2.5 py-0.5 rounded border border-gray-200">Nonaktif</span>
                </td>
                <td class="px-6 py-4 text-right">
                    <button class="text-primary-600 hover:text-primary-800 hover:underline text-sm font-medium">Jadikan Aktif</button>
                </td>
            </tr>
            <tr class="bg-white hover:bg-gray-50">
                <td class="px-6 py-4 font-medium text-gray-900">ResNet50-Food-v1.0</td>
                <td class="px-6 py-4">01 Jan 2026</td>
                <td class="px-6 py-4">85.5%</td>
                <td class="px-6 py-4">
                    <span class="bg-gray-100 text-gray-600 text-xs font-medium px-2.5 py-0.5 rounded border border-gray-200">Arsip</span>
                </td>
                <td class="px-6 py-4 text-right">
                    <button class="text-primary-600 hover:text-primary-800 hover:underline text-sm font-medium">Jadikan Aktif</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
