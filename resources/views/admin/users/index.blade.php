@extends('layouts.admin')

@section('title', 'Manajemen User')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Manajemen Pengguna</h2>
        <p class="text-gray-500 text-sm mt-1">Kelola akun dan role pengguna aplikasi GoHealth.</p>
    </div>
    <div class="flex items-center gap-3">
        <button class="bg-primary-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-primary-700 transition shadow-sm flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah User
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
            <input type="text" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Cari user (nama, email)...">
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-4">User</th>
                    <th scope="col" class="px-6 py-4">Role</th>
                    <th scope="col" class="px-6 py-4">Status</th>
                    <th scope="col" class="px-6 py-4">Bergabung Pada</th>
                    <th scope="col" class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 1 -->
                <tr class="bg-white border-b border-gray-50 hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-medium text-gray-900">
                        <div class="flex items-center gap-3">
                            <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=Admin+User&background=10b981&color=fff" alt="Avatar">
                            <div>
                                <div class="font-semibold text-gray-800">Admin User</div>
                                <div class="text-xs text-gray-500 font-normal">admin@gohealth.ai</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded border border-purple-200">Admin</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <div class="h-2 w-2 rounded-full bg-green-500"></div>
                            <span class="text-sm font-medium text-gray-700">Aktif</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-600">12 Jan 2026</td>
                    <td class="px-6 py-4 text-right">
                        <button class="text-gray-400 hover:text-gray-900 focus:outline-none">
                            <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                        </button>
                    </td>
                </tr>
                <!-- Row 2 -->
                <tr class="bg-white border-b border-gray-50 hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-medium text-gray-900">
                        <div class="flex items-center gap-3">
                            <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=John+Doe&background=f3f4f6&color=374151" alt="Avatar">
                            <div>
                                <div class="font-semibold text-gray-800">John Doe</div>
                                <div class="text-xs text-gray-500 font-normal">john.doe@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded border border-gray-200">User</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <div class="h-2 w-2 rounded-full bg-green-500"></div>
                            <span class="text-sm font-medium text-gray-700">Aktif</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-600">24 Feb 2026</td>
                    <td class="px-6 py-4 text-right">
                        <button class="text-gray-400 hover:text-gray-900 focus:outline-none">
                            <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
