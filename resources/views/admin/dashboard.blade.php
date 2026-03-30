@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Selamat datang kembali, Admin!</h2>
        <p class="text-gray-500 text-sm mt-1">Ringkasan performa sistem GoHealth hari ini.</p>
    </div>
    <div class="flex items-center gap-3">
        <span class="text-sm font-medium text-gray-500">Tgl: {{ now()->format('d M Y') }}</span>
        <button class="bg-white border border-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-50 transition shadow-sm flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
            Export Laporan
        </button>
    </div>
</div>

<!-- Stat Cards Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <!-- Total Users -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
        <div class="flex items-start justify-between mb-4">
            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <span class="inline-flex items-center gap-1 text-xs font-semibold text-green-600 bg-green-50 px-2 py-1 rounded-full">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                12%
            </span>
        </div>
        <div>
            <h3 class="text-gray-500 text-sm font-medium mb-1">Total Pengguna</h3>
            <p class="text-3xl font-bold text-gray-900">14,235</p>
        </div>
    </div>

    <!-- Total Scans -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
        <div class="flex items-start justify-between mb-4">
            <div class="w-12 h-12 bg-primary-50 text-primary-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path></svg>
            </div>
            <span class="inline-flex items-center gap-1 text-xs font-semibold text-green-600 bg-green-50 px-2 py-1 rounded-full">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                8%
            </span>
        </div>
        <div>
            <h3 class="text-gray-500 text-sm font-medium mb-1">Total Scan AI</h3>
            <p class="text-3xl font-bold text-gray-900">89,402</p>
        </div>
    </div>

    <!-- Total Foods -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
        <div class="flex items-start justify-between mb-4">
            <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
            <span class="inline-flex items-center gap-1 text-xs font-semibold text-gray-600 bg-gray-50 px-2 py-1 rounded-full">
                -
            </span>
        </div>
        <div>
            <h3 class="text-gray-500 text-sm font-medium mb-1">Database Makanan</h3>
            <p class="text-3xl font-bold text-gray-900">8,540</p>
        </div>
    </div>

    <!-- Calorie Total -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
        <div class="flex items-start justify-between mb-4">
            <div class="w-12 h-12 bg-red-50 text-red-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
            <span class="inline-flex items-center gap-1 text-xs font-semibold text-red-600 bg-red-50 px-2 py-1 rounded-full">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0v-8m0 8l-8-8-4 4-6-6"></path></svg>
                3%
            </span>
        </div>
        <div>
            <h3 class="text-gray-500 text-sm font-medium mb-1">Kalori Terdeteksi Hari Ini</h3>
            <p class="text-3xl font-bold text-gray-900">1.2M <span class="text-base font-normal text-gray-500">kcal</span></p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Chart Placeholder -->
    <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-gray-900">Aktivitas Scan Mingguan</h3>
            <select class="bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2">
                <option>7 Hari Terakhir</option>
                <option>Bulan Ini</option>
            </select>
        </div>
        <div class="h-72 w-full flex items-end justify-between gap-2">
            <!-- Mock Bar Chart -->
            <div class="w-full bg-primary-100 rounded-t-sm h-[40%] hover:bg-primary-200 transition relative group"><div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100">Mon</div></div>
            <div class="w-full bg-primary-300 rounded-t-sm h-[60%] hover:bg-primary-400 transition relative group"><div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100">Tue</div></div>
            <div class="w-full bg-primary-500 rounded-t-sm h-[80%] hover:bg-primary-600 transition relative group"><div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100">Wed</div></div>
            <div class="w-full bg-primary-200 rounded-t-sm h-[50%] hover:bg-primary-300 transition relative group"><div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100">Thu</div></div>
            <div class="w-full bg-primary-400 rounded-t-sm h-[75%] hover:bg-primary-500 transition relative group"><div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100">Fri</div></div>
            <div class="w-full bg-primary-600 rounded-t-sm h-[95%] hover:bg-primary-700 transition relative group"><div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100">Sat</div></div>
            <div class="w-full bg-primary-300 rounded-t-sm h-[65%] hover:bg-primary-400 transition relative group"><div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100">Sun</div></div>
        </div>
    </div>

    <!-- Recent Scans List -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-gray-900">Scan Terbaru</h3>
            <a href="{{ route('admin.scans.index') }}" class="text-sm text-primary-600 font-medium hover:underline">Lihat Semua</a>
        </div>
        <div class="space-y-4">
            <!-- Scan item -->
            <div class="flex items-center justify-between p-3 rounded-xl hover:bg-gray-50 transition border border-transparent hover:border-gray-100">
                <div class="flex items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Food" class="w-12 h-12 rounded-lg object-cover">
                    <div>
                        <p class="text-sm font-bold text-gray-900">Salad Sayur Organik</p>
                        <p class="text-xs text-gray-500">oleh user_001 • 5 menit lalu</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm font-bold text-primary-600">320 kcal</p>
                    <span class="text-[10px] font-medium px-2 py-0.5 rounded bg-green-100 text-green-700">Akurasi 98%</span>
                </div>
            </div>
            <!-- Scan item -->
            <div class="flex items-center justify-between p-3 rounded-xl hover:bg-gray-50 transition border border-transparent hover:border-gray-100">
                <div class="flex items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Food" class="w-12 h-12 rounded-lg object-cover">
                    <div>
                        <p class="text-sm font-bold text-gray-900">Burger Daging Sapi</p>
                        <p class="text-xs text-gray-500">oleh alice_smith • 15 menit lalu</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm font-bold text-red-600">850 kcal</p>
                    <span class="text-[10px] font-medium px-2 py-0.5 rounded bg-green-100 text-green-700">Akurasi 96%</span>
                </div>
            </div>
            <!-- Scan item -->
            <div class="flex items-center justify-between p-3 rounded-xl hover:bg-gray-50 transition border border-transparent hover:border-gray-100">
                <div class="flex items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1628840042765-356cda07504e?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Food" class="w-12 h-12 rounded-lg object-cover">
                    <div>
                        <p class="text-sm font-bold text-gray-900">Pizza Margherita</p>
                        <p class="text-xs text-gray-500">oleh john_doe12 • 32 menit lalu</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm font-bold text-orange-500">1100 kcal</p>
                    <span class="text-[10px] font-medium px-2 py-0.5 rounded bg-yellow-100 text-yellow-700">Akurasi 89%</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
