@extends('layouts.landing')

@section('content')

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-primary-50 to-white pt-20 pb-32 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="lg:grid lg:grid-cols-12 lg:gap-16 items-center">
            <div class="col-span-12 lg:col-span-6 lg:mb-0 mb-16 text-center lg:text-left">
                <span class="inline-block py-1 px-3 rounded-full bg-primary-100 text-primary-700 text-sm font-semibold mb-4 border border-primary-200">✨ AI Cerdas untuk Pola Makan Sehat</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight mb-6 tracking-tight">
                    Smart Food AI for Your <span class="text-primary-600 block sm:inline">Health and Nutrition</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-600 mb-8 max-w-2xl mx-auto lg:mx-0">
                    Cukup ambil foto makanan Anda, dan AI cerdas kami akan mendeteksi kalori, nutrisi, dan memberikan estimasi kesehatan secara otomatis dalam hitungan detik.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="#" class="px-8 py-4 rounded-xl bg-gray-900 text-white font-medium shadow-lg hover:shadow-xl hover:bg-gray-800 transition transform hover:-translate-y-1 flex items-center justify-center gap-2">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.523 15.3414c-.0114-2.8223 2.1932-4.1485 2.298-4.2098-1.282-1.9366-3.2307-2.1973-3.9515-2.228-1.6384-.1655-3.2185 1.002-4.0537 1.002-.8352 0-2.16-1.002-3.5283-.9745-1.7828.0263-3.4187.9745-4.3414 2.6247-1.8752 3.3276-.4813 8.2435 1.3533 10.957 3.551 5.2758 7.0783-.0212 8.214-4.171z"/><path d="M14.5057 5.1764c.731-.8843 1.2263-2.115 1.0917-3.3444-1.0772.0436-2.4208.7303-3.178 1.6146-.68.7904-1.2723 2.046-1.1116 3.2505 1.1444.0886 2.4796-.6328 3.2198-1.5207z"/></svg>
                        App Store
                    </a>
                    <a href="#" class="px-8 py-4 rounded-xl bg-primary-600 text-white font-medium shadow-lg shadow-primary-600/30 hover:shadow-xl hover:shadow-primary-600/40 hover:bg-primary-700 transition transform hover:-translate-y-1 flex items-center justify-center gap-2">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M3.13 2.22l12.44 12.44-5.01 5.01-7.43-17.45z" opacity=".8"/><path d="M21.16 11.26l-5.59-3.23-2.58 2.58 2.58 2.58 5.59-3.23c.33-.19.53-.54.53-.92s-.2-.72-.53-.92z"/><path d="M13.2 14.1l-2.09-2.09-8.49 8.49c.27.05.55 0 .8-.15l9.78-5.65 0-.6z" opacity=".8"/><path d="M12.91 10.15L3.13 4.5l8.49 8.49 1.29-1.29z"/></svg>
                        Google Play
                    </a>
                </div>
            </div>

            <div class="col-span-12 lg:col-span-6 relative">
                <!-- Abstract blobs behind phone -->
                <div class="absolute inset-0 bg-primary-200/50 rounded-full blur-3xl opacity-60"></div>
                <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-green-400 rounded-full blur-3xl opacity-30 transform translate-x-12"></div>
                
                <!-- Phone Mockup Container -->
                <div class="relative mx-auto w-72 h-[580px] bg-gray-900 border-[10px] border-gray-900 rounded-[3rem] shadow-2xl shadow-[0_0_60px_rgba(16,185,129,0.3)] z-10 overflow-hidden transform rotate-2 hover:rotate-0 transition duration-500"></div>
                    <div class="absolute top-0 inset-x-0 h-6 bg-black z-20 rounded-b-3xl"></div>
                    <div class="w-full h-full bg-gray-50 flex flex-col items-center justify-center p-4">
                        <div class="mb-6 flex flex-col items-center justify-center">
                    <img 
                        src="{{ asset('images/logo.png') }}" 
                        alt="GoHealth Logo" 
                        class="w-24 h-24 mb-4 drop-shadow-[0_0_25px_rgba(16,185,129,0.6)]"
                    >
                </div>
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path></svg>
                        </div>
                        <div class="w-full space-y-3">
                            <div class="h-4 bg-gray-300 rounded-full w-3/4 mx-auto animate-pulse"></div>
                            <div class="h-3 bg-gray-200 rounded-full w-1/2 mx-auto animate-pulse"></div>
                            <div class="grid grid-cols-2 gap-2 mt-6">
                                <div class="h-16 bg-primary-100 rounded-xl animate-pulse"></div>
                                <div class="h-16 bg-primary-100 rounded-xl animate-pulse"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Floating stat cards -->
                <div class="absolute top-1/4 -left-8 md:-left-16 bg-white p-4 rounded-2xl shadow-xl z-20 animate-bounce" style="animation-duration: 3s;">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-orange-100 text-orange-500 rounded-full flex items-center justify-center">🔥</div>
                        <div>
                            <p class="text-xs text-gray-500 font-medium">Kalori Terdeteksi</p>
                            <p class="text-sm font-bold text-gray-900">420 kcal</p>
                        </div>
                    </div>
                </div>
                
                <div class="absolute bottom-1/4 -right-4 bg-white p-4 rounded-2xl shadow-xl z-20 animate-bounce" style="animation-duration: 4s; animation-delay: 1s;">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-100 text-green-500 rounded-full flex items-center justify-center">🥑</div>
                        <div>
                            <p class="text-xs text-gray-500 font-medium">Nutrisi Gizi</p>
                            <p class="text-sm font-bold text-gray-900">High Protein</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div class="order-2 md:order-1 relative rounded-3xl overflow-hidden shadow-xl">
                <div class="absolute inset-0 bg-primary-900/10"></div>
                <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" alt="Healthy Food Detection" class="w-full h-full object-cover">
                <!-- Scanning overlay effect -->
                <div class="absolute top-1/2 left-0 right-0 h-1 bg-primary-500 shadow-[0_0_15px_rgba(16,185,129,0.8)] z-10" style="animation: scan 3s infinite linear;"></div>
            </div>
            <div class="order-1 md:order-2">
                <span class="text-primary-600 font-semibold tracking-wider text-sm uppercase">Tentang GoHealth</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-6">AI Cerdas Pendukung Gaya Hidup Sehatmu</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Sering kesulitan menghitung kalori atau menakar nutrisi dari apa yang kamu makan? GoHealth menggunakan teknologi <strong>Artificial Intelligence Vision</strong> yang mutakhir untuk mendeteksi makanan hanya dari satu jepretan foto.
                </p>
                <div class="bg-primary-50 border-l-4 border-primary-500 p-4 rounded-r-lg mb-6">
                    <p class="text-primary-800 text-sm font-medium">
                        Model AI kami telah dilatih dengan jutaan data gambar makanan lokal hingga mancanegara untuk memberikan tingkat akurasi hingga 95% dalam mendeteksi dan memperkirakan gizi (Kalori, Protein, Lemak, Karbohidrat).
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-primary-600 font-semibold tracking-wider text-sm uppercase">Fitur Unggulan</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-4">Fitur Utama GoHealth</h2>
            <p class="text-gray-600">Semua yang Anda butuhkan untuk memantau asupan makanan dengan cerdas dan mudah dicerna.</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                <div class="w-14 h-14 bg-primary-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Scan AI Makanan</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Deteksi makanan otomatis hanya dengan memotret menggunakan kamera smartphone Anda.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                <div class="w-14 h-14 bg-orange-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Estimasi Kalori</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Kalkulasi presisi jumlah kalori dan makronutrien berdasarkan jenis makanan yang dideteksi.</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Target Harian</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Pantau asupan kalori dan nutrisi Anda apakah masih sesuai dengan ambang batas harian.</p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Riwayat Pola Makan</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Catatan tersimpan otomatis yang bisa Anda review per minggu hingga per bulan.</p>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section id="how-it-works" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Cara Kerja yang Simpel</h2>
            <p class="text-gray-600">3 Langkah mudah untuk menakar nutrisi makanan Anda harian.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-12 relative">
            <!-- connecting line for desktop -->
            <div class="hidden md:block absolute top-12 left-[15%] right-[15%] h-0.5 bg-gray-200 z-0"></div>

            <!-- Step 1 -->
            <div class="relative z-10 text-center">
                <div class="w-24 h-24 mx-auto bg-primary-50 rounded-full border-4 border-white shadow-lg flex items-center justify-center mb-6 relative">
                    <div class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-primary-600 text-white font-bold flex items-center justify-center shadow-md">1</div>
                    <svg class="w-10 h-10 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path></svg>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-2">Ambil Foto</h4>
                <p class="text-sm text-gray-600 px-4">Buka aplikasi GoHealth, lalu jepret foto piring makanan Anda secara utuh.</p>
            </div>

            <!-- Step 2 -->
            <div class="relative z-10 text-center">
                <div class="w-24 h-24 mx-auto bg-primary-50 rounded-full border-4 border-white shadow-lg flex items-center justify-center mb-6 relative">
                    <div class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-primary-600 text-white font-bold flex items-center justify-center shadow-md">2</div>
                    <svg class="w-10 h-10 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-2">AI Mendeteksi Makanan</h4>
                <p class="text-sm text-gray-600 px-4">Sistem AI memproses gambar, mengenali berbagai komponen makanan yang ada, dan menghitung porsi kasarnya.</p>
            </div>

            <!-- Step 3 -->
            <div class="relative z-10 text-center">
                <div class="w-24 h-24 mx-auto bg-primary-50 rounded-full border-4 border-white shadow-lg flex items-center justify-center mb-6 relative">
                    <div class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-primary-600 text-white font-bold flex items-center justify-center shadow-md">3</div>
                    <svg class="w-10 h-10 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-2">Terima Hasil & Nutrisi</h4>
                <p class="text-sm text-gray-600 px-4">Hasil estimasi kalori, makronutrisi, dan data rekap tersimpan pada dashboard Anda.</p>
            </div>
        </div>
    </div>
</section>

<!-- App Preview/Screenshots -->
<section class="py-24 bg-primary-900 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Preview Aplikasi GoHealth</h2>
            <p class="text-primary-200">Desain minimalis dan bersih untuk pengalaman tracking yang intuitif.</p>
        </div>

        <!-- Mockup Carousel -->
        <div class="flex flex-nowrap overflow-x-auto gap-6 sm:gap-10 pb-8 snap-x snap-mandatory hide-scroll">
            
            <!-- Mockup 1 -->
            <div class="snap-center shrink-0 w-64 md:w-72 relative">
                <div class="w-full h-[550px] bg-white border-8 border-gray-800 rounded-[2.5rem] shadow-2xl overflow-hidden relative">
                    <!-- Screen content -->
                    <div class="absolute inset-x-0 top-0 h-40 bg-primary-500 flex flex-col items-center justify-center p-6 text-white text-center">
                        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-lg mb-3">
                            <span class="text-3xl font-bold text-primary-600">G</span>
                        </div>
                        <h3 class="font-bold text-xl">GoHealth</h3>
                    </div>
                </div>
                <p class="text-white text-center mt-4 font-medium">1. Splash Screen</p>
            </div>

            <!-- Mockup 2 -->
            <div class="snap-center shrink-0 w-64 md:w-72 relative">
                <div class="w-full h-[550px] bg-gray-50 border-8 border-gray-800 rounded-[2.5rem] shadow-2xl overflow-hidden">
                    <div class="p-6 h-full flex flex-col justify-center gap-4">
                        <div class="w-full h-8 bg-gray-200 rounded animate-pulse"></div>
                        <div class="w-full h-12 bg-white border border-gray-200 rounded-lg"></div>
                        <div class="w-full h-12 bg-white border border-gray-200 rounded-lg"></div>
                        <div class="w-full h-12 bg-primary-600 rounded-lg mt-4"></div>
                        <div class="w-1/2 mx-auto h-4 bg-gray-200 rounded animate-pulse mt-2"></div>
                    </div>
                </div>
                <p class="text-white text-center mt-4 font-medium">2. Secure Login</p>
            </div>

            <!-- Mockup 3 -->
            <div class="snap-center shrink-0 w-64 md:w-72 relative transform md:-translate-y-8">
                <div class="w-full h-[550px] bg-gray-50 border-8 border-gray-800 rounded-[2.5rem] shadow-2xl overflow-hidden border-primary-500 shadow-[0_0_30px_rgba(16,185,129,0.3)]">
                    <div class="p-5 h-full flex flex-col gap-4">
                        <div class="flex justify-between items-center mb-2">
                            <div class="w-1/2 h-4 bg-gray-300 rounded"></div>
                            <div class="w-8 h-8 rounded-full bg-gray-300"></div>
                        </div>
                        <!-- Daily ring -->
                        <div class="w-32 h-32 mx-auto rounded-full border-8 border-primary-200 flex items-center justify-center border-t-primary-500 rotate-45 mb-4">
                            <div class="w-24 h-24 bg-white rounded-full -rotate-45 flex flex-col items-center justify-center">
                                <span class="text-xl font-bold">1200</span>
                                <span class="text-[10px] text-gray-500">kcal left</span>
                            </div>
                        </div>
                        <!-- Items -->
                        <div class="space-y-3">
                            <div class="h-16 bg-white rounded-xl flex items-center p-3 shadow-sm shadow-black/5 gap-3">
                                <div class="w-10 h-10 bg-orange-100 rounded-lg"></div>
                                <div class="flex-1 space-y-2">
                                    <div class="w-3/4 h-3 bg-gray-200 rounded"></div>
                                    <div class="w-1/2 h-2 bg-gray-100 rounded"></div>
                                </div>
                            </div>
                            <div class="h-16 bg-white rounded-xl flex items-center p-3 shadow-sm shadow-black/5 gap-3">
                                <div class="w-10 h-10 bg-green-100 rounded-lg"></div>
                                <div class="flex-1 space-y-2">
                                    <div class="w-2/3 h-3 bg-gray-200 rounded"></div>
                                    <div class="w-1/3 h-2 bg-gray-100 rounded"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-white text-center mt-4 font-medium text-lg">3. User Dashboard</p>
            </div>

            <!-- Mockup 4 -->
            <div class="snap-center shrink-0 w-64 md:w-72 relative">
                <div class="w-full h-[550px] bg-black border-8 border-gray-800 rounded-[2.5rem] shadow-2xl overflow-hidden relative">
                    <!-- camera frame -->
                    <div class="absolute inset-10 border-2 border-white/50 rounded-xl">
                        <div class="absolute -top-1 -left-1 w-4 h-4 border-t-2 border-l-2 border-primary-500"></div>
                        <div class="absolute -top-1 -right-1 w-4 h-4 border-t-2 border-r-2 border-primary-500"></div>
                        <div class="absolute -bottom-1 -left-1 w-4 h-4 border-b-2 border-l-2 border-primary-500"></div>
                        <div class="absolute -bottom-1 -right-1 w-4 h-4 border-b-2 border-r-2 border-primary-500"></div>
                    </div>
                    <div class="absolute bottom-8 inset-x-0 flex justify-center">
                        <div class="w-16 h-16 rounded-full border-4 border-white flex items-center justify-center bg-white/20">
                            <div class="w-12 h-12 bg-white rounded-full"></div>
                        </div>
                    </div>
                </div>
                <p class="text-white text-center mt-4 font-medium">4. Smart Scan UI</p>
            </div>

            <!-- Mockup 5 -->
            <div class="snap-center shrink-0 w-64 md:w-72 relative">
                <div class="w-full h-[550px] bg-white border-8 border-gray-800 rounded-[2.5rem] shadow-2xl overflow-hidden">
                    <!-- Header Image -->
                    <div class="h-48 bg-gray-300 relative">
                        <div class="absolute -bottom-6 w-full px-6">
                            <div class="px-5 py-3 bg-white rounded-xl shadow-lg border border-gray-100 font-bold text-gray-800 text-center">Nasi Goreng Spesial</div>
                        </div>
                    </div>
                    <!-- Stats Grid -->
                    <div class="pt-12 px-5 grid grid-cols-2 gap-3">
                        <div class="bg-red-50 p-3 rounded-xl border border-red-100">
                            <p class="text-[10px] text-red-500 font-bold uppercase">Kalori</p>
                            <p class="font-bold text-sm text-gray-800">450 kcal</p>
                        </div>
                        <div class="bg-blue-50 p-3 rounded-xl border border-blue-100">
                            <p class="text-[10px] text-blue-500 font-bold uppercase">Protein</p>
                            <p class="font-bold text-sm text-gray-800">12 g</p>
                        </div>
                        <div class="bg-yellow-50 p-3 rounded-xl border border-yellow-100">
                            <p class="text-[10px] text-yellow-500 font-bold uppercase">Karbo</p>
                            <p class="font-bold text-sm text-gray-800">55 g</p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-xl border border-gray-200">
                            <p class="text-[10px] text-gray-500 font-bold uppercase">Lemak</p>
                            <p class="font-bold text-sm text-gray-800">18 g</p>
                        </div>
                    </div>
                    <!-- Button placeholder -->
                    <div class="absolute bottom-6 inset-x-5 h-12 bg-primary-600 rounded-xl"></div>
                </div>
                <p class="text-white text-center mt-4 font-medium">5. Analysis Result</p>
            </div>
            
        </div>
    </div>
</section>

<!-- Call to Action -->
<section id="download" class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Mulai Gaya Hidup Sehat Anda Hari Ini</h2>
        <p class="text-lg text-gray-600 mb-8">Download aplikasi GoHealth dan bergabung dengan ribuan pengguna lain yang telah merubah pola makan mereka.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#" class="px-8 py-4 rounded-xl bg-gray-900 text-white font-medium shadow-lg hover:shadow-xl hover:bg-gray-800 transition transform hover:-translate-y-1 flex items-center justify-center gap-2">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.523 15.3414c-.0114-2.8223 2.1932-4.1485 2.298-4.2098-1.282-1.9366-3.2307-2.1973-3.9515-2.228-1.6384-.1655-3.2185 1.002-4.0537 1.002-.8352 0-2.16-1.002-3.5283-.9745-1.7828.0263-3.4187.9745-4.3414 2.6247-1.8752 3.3276-.4813 8.2435 1.3533 10.957 3.551 5.2758 7.0783-.0212 8.214-4.171z"/><path d="M14.5057 5.1764c.731-.8843 1.2263-2.115 1.0917-3.3444-1.0772.0436-2.4208.7303-3.178 1.6146-.68.7904-1.2723 2.046-1.1116 3.2505 1.1444.0886 2.4796-.6328 3.2198-1.5207z"/></svg>
                App Store
            </a>
            <a href="#" class="px-8 py-4 rounded-xl bg-primary-600 text-white font-medium shadow-lg hover:shadow-xl hover:bg-primary-700 transition transform hover:-translate-y-1 flex items-center justify-center gap-2">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M3.13 2.22l12.44 12.44-5.01 5.01-7.43-17.45z" opacity=".8"/><path d="M21.16 11.26l-5.59-3.23-2.58 2.58 2.58 2.58 5.59-3.23c.33-.19.53-.54.53-.92s-.2-.72-.53-.92z"/><path d="M13.2 14.1l-2.09-2.09-8.49 8.49c.27.05.55 0 .8-.15l9.78-5.65 0-.6z" opacity=".8"/><path d="M12.91 10.15L3.13 4.5l8.49 8.49 1.29-1.29z"/></svg>
                Google Play
            </a>
        </div>
    </div>
</section>

<style>
/* Utilities */
@keyframes scan {
  0% { top: 0; opacity: 1; }
  50% { top: 100%; opacity: 0.5; }
  100% { top: 0; opacity: 1; }
}

.hide-scroll::-webkit-scrollbar {
  display: none;
}
.hide-scroll {
  -ms-overflow-style: none;
  scrollbar-width: none;
}
</style>

@endsection
