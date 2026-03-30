@extends('layouts.admin')

@section('title', 'Riwayat Scan User')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Riwayat Deteksi AI</h2>
        <p class="text-gray-500 text-sm mt-1">Daftar log aktivitas scan makanan oleh pengguna.</p>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-gray-50">
        <p class="text-sm text-gray-600">Menampilkan 10 record terakhir.</p>
        <button class="bg-white border border-gray-200 text-gray-700 px-3 py-1.5 rounded-lg text-sm hover:bg-gray-100 transition shadow-sm">Muat Ulang</button>
    </div>
    
    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase border-b border-gray-100 bg-white">
                <tr>
                    <th scope="col" class="px-6 py-4">ID Scan</th>
                    <th scope="col" class="px-6 py-4">Gambar</th>
                    <th scope="col" class="px-6 py-4">Deteksi Makanan</th>
                    <th scope="col" class="px-6 py-4">User</th>
                    <th scope="col" class="px-6 py-4">Akurasi AI</th>
                    <th scope="col" class="px-6 py-4">Waktu</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 bg-white">
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-mono text-xs text-gray-600">#SCN-89402</td>
                    <td class="px-6 py-4">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=50&q=80" alt="Scanned Food" class="w-10 h-10 rounded-lg object-cover shadow-sm">
                    </td>
                    <td class="px-6 py-4">
                        <span class="font-medium text-gray-900 block">Salad Sayur Organik</span>
                        <span class="text-xs text-primary-600 bg-primary-50 px-2 py-0.5 rounded inline-block mt-1">320 kcal</span>
                    </td>
                    <td class="px-6 py-4 text-gray-700 font-medium text-sm">user_001</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <div class="w-full bg-gray-200 rounded-full h-2.5 max-w-[80px]">
                              <div class="bg-green-500 h-2.5 rounded-full" style="width: 98%"></div>
                            </div>
                            <span class="text-xs font-medium text-green-700">98%</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-500 text-xs">5 menit lalu</td>
                </tr>
                
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-mono text-xs text-gray-600">#SCN-89401</td>
                    <td class="px-6 py-4">
                        <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?ixlib=rb-1.2.1&auto=format&fit=crop&w=50&q=80" alt="Scanned Food" class="w-10 h-10 rounded-lg object-cover shadow-sm">
                    </td>
                    <td class="px-6 py-4">
                        <span class="font-medium text-gray-900 block">Burger Sapi Standar</span>
                        <span class="text-xs text-red-600 bg-red-50 px-2 py-0.5 rounded inline-block mt-1">850 kcal</span>
                    </td>
                    <td class="px-6 py-4 text-gray-700 font-medium text-sm">alice_smith</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <div class="w-full bg-gray-200 rounded-full h-2.5 max-w-[80px]">
                              <div class="bg-green-500 h-2.5 rounded-full" style="width: 96%"></div>
                            </div>
                            <span class="text-xs font-medium text-green-700">96%</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-500 text-xs">15 menit lalu</td>
                </tr>
                
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-mono text-xs text-gray-600">#SCN-89400</td>
                    <td class="px-6 py-4">
                         <div class="w-10 h-10 rounded-lg bg-gray-200 blur-[2px] border border-gray-300"></div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="font-medium text-gray-900 block">Tidak Dikenali</span>
                        <span class="text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded inline-block mt-1">Error</span>
                    </td>
                    <td class="px-6 py-4 text-gray-700 font-medium text-sm">budi_anto</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <div class="w-full bg-gray-200 rounded-full h-2.5 max-w-[80px]">
                              <div class="bg-red-500 h-2.5 rounded-full" style="width: 45%"></div>
                            </div>
                            <span class="text-xs font-medium text-red-700">45%</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-500 text-xs">1 jam lalu</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
