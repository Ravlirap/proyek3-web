@extends('layouts.admin')

@section('title', 'Data Makanan')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Database Makanan</h2>
        <p class="text-gray-500 text-sm mt-1">Kelola data makanan, kalori, dan makronutrien untuk deteksi AI.</p>
    </div>
    <div class="flex items-center gap-3">
        <button class="bg-primary-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-primary-700 transition shadow-sm flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Makanan
        </button>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <!-- Toolbar -->
    <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="relative w-full sm:max-w-xs">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="text" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Cari makanan...">
        </div>
        
        <div class="flex items-center gap-2">
            <button class="flex items-center gap-2 bg-white border border-gray-200 text-gray-700 px-3 py-2 rounded-lg text-sm font-medium hover:bg-gray-50 transition">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                Filter
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-4 rounded-tl-lg">Nama Makanan</th>
                    <th scope="col" class="px-6 py-4">Kalori (kcal)</th>
                    <th scope="col" class="px-6 py-4">Protein (g)</th>
                    <th scope="col" class="px-6 py-4">Karbo (g)</th>
                    <th scope="col" class="px-6 py-4">Lemak (g)</th>
                    <th scope="col" class="px-6 py-4 rounded-tr-lg text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 1 -->
                <tr class="bg-white border-b border-gray-50 hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-medium text-gray-900 flex items-center gap-3">
                        <div class="w-10 h-10 rounded bg-gray-100 flex items-center justify-center text-xl">🥗</div>
                        Salad Sayur Organik
                    </td>
                    <td class="px-6 py-4"><span class="bg-gray-100 text-gray-800 text-xs font-semibold px-2.5 py-0.5 rounded border border-gray-200">120</span></td>
                    <td class="px-6 py-4 text-gray-600">3.5</td>
                    <td class="px-6 py-4 text-gray-600">15.0</td>
                    <td class="px-6 py-4 text-gray-600">5.2</td>
                    <td class="px-6 py-4 text-right">
                        <a href="#" class="font-medium text-primary-600 hover:underline inline-block mr-3">Edit</a>
                        <a href="#" class="font-medium text-red-600 hover:underline inline-block">Hapus</a>
                    </td>
                </tr>
                <!-- Row 2 -->
                <tr class="bg-white border-b border-gray-50 hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-medium text-gray-900 flex items-center gap-3">
                        <div class="w-10 h-10 rounded bg-gray-100 flex items-center justify-center text-xl">🍗</div>
                        Dada Ayam Bakar (100g)
                    </td>
                    <td class="px-6 py-4"><span class="bg-gray-100 text-gray-800 text-xs font-semibold px-2.5 py-0.5 rounded border border-gray-200">165</span></td>
                    <td class="px-6 py-4 text-gray-600">31.0</td>
                    <td class="px-6 py-4 text-gray-600">0.0</td>
                    <td class="px-6 py-4 text-gray-600">3.6</td>
                    <td class="px-6 py-4 text-right">
                        <a href="#" class="font-medium text-primary-600 hover:underline inline-block mr-3">Edit</a>
                        <a href="#" class="font-medium text-red-600 hover:underline inline-block">Hapus</a>
                    </td>
                </tr>
                <!-- Row 3 -->
                <tr class="bg-white hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-medium text-gray-900 flex items-center gap-3">
                        <div class="w-10 h-10 rounded bg-gray-100 flex items-center justify-center text-xl">🍚</div>
                        Nasi Putih (1 Porse)
                    </td>
                    <td class="px-6 py-4"><span class="bg-gray-100 text-gray-800 text-xs font-semibold px-2.5 py-0.5 rounded border border-gray-200">204</span></td>
                    <td class="px-6 py-4 text-gray-600">4.2</td>
                    <td class="px-6 py-4 text-gray-600">44.0</td>
                    <td class="px-6 py-4 text-gray-600">0.4</td>
                    <td class="px-6 py-4 text-right">
                        <a href="#" class="font-medium text-primary-600 hover:underline inline-block mr-3">Edit</a>
                        <a href="#" class="font-medium text-red-600 hover:underline inline-block">Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination Mock -->
    <div class="p-4 border-t border-gray-100 flex items-center justify-between">
        <span class="text-sm text-gray-500">Menampilkan 1 hingga 3 dari 8,540 Makanan</span>
        <div class="inline-flex rounded-md shadow-sm" role="group">
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-primary-700 pointer-events-none opacity-50">
                Sebelumnya
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-primary-700 bg-primary-50 border-t border-b border-gray-200">
                1
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 hover:bg-gray-100 hover:text-primary-700">
                2
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-primary-700">
                Selanjutnya
            </button>
        </div>
    </div>
</div>
@endsection
