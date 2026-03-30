@extends('layouts.master')

@section('title', 'Beranda - Tani Merdeka Indonesia')

@section('content')
    <div class="px-6 md:px-16 py-8">

        <div class="relative rounded-3xl overflow-hidden flex items-center min-h-[350px] md:min-h-[400px]">
            <img src="{{ asset('assets/images/background.png') }}" class="absolute inset-0 w-full h-full object-cover"
                alt="Hero Banner">
            <div class="absolute inset-0 bg-gradient-to-r from-black/40 to-transparent"></div>

            <div class="relative z-10 w-full md:w-2/3 text-white px-8 md:px-14 py-12 space-y-6 text-left">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight">
                    Akses Hasil Produk <br>Tani Indonesia!
                </h1>
                <div class="pt-2">
                    <a href="#"
                        class="inline-block bg-yellow-400 text-yellow-950 font-bold px-8 py-3 rounded-full hover:bg-yellow-300 transition shadow-md hover:scale-105 transform">
                        Akses Sekarang!
                    </a>
                </div>
                <p class="mt-8 font-medium text-lg pt-4 opacity-90">Support by Tani Merdeka</p>
            </div>
        </div>

        <div class="mt-16">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-8 md:mb-10 text-center md:text-left tracking-tight">
                Bidang usaha tani merdeka</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">

                <!-- Card Pertanian -->
                <div
                    class="group relative rounded-3xl h-64 overflow-hidden shadow-md transition hover:shadow-xl hover:-translate-y-1 transform cursor-pointer">
                    <img src="{{ asset('assets/images/icon-pertanian.png') }}"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-500"
                        alt="Pertanian">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

                    <div
                        class="absolute bottom-6 left-1/2 transform -translate-x-1/2 w-3/4 bg-white/20 backdrop-blur-md px-6 py-3 rounded-2xl border border-white/30 text-center shadow-inner">
                        <span class="text-lg font-bold text-white tracking-wide">Pertanian</span>
                    </div>
                </div>

                <!-- Card Perikanan -->
                <div
                    class="group relative rounded-3xl h-64 overflow-hidden shadow-md transition hover:shadow-xl hover:-translate-y-1 transform cursor-pointer">
                    <img src="{{ asset('assets/images/icon-perikanan.png') }}"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-500"
                        alt="Perikanan">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

                    <div
                        class="absolute bottom-6 left-1/2 transform -translate-x-1/2 w-3/4 bg-white/20 backdrop-blur-md px-6 py-3 rounded-2xl border border-white/30 text-center shadow-inner">
                        <span class="text-lg font-bold text-white tracking-wide">Perikanan</span>
                    </div>
                </div>

                <!-- Card Peternakan -->
                <div
                    class="group relative rounded-3xl h-64 overflow-hidden shadow-md transition hover:shadow-xl hover:-translate-y-1 transform cursor-pointer">
                    <img src="{{ asset('assets/images/icon-peternakan.png') }}"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-500"
                        alt="Peternakan">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

                    <div
                        class="absolute bottom-6 left-1/2 transform -translate-x-1/2 w-3/4 bg-white/20 backdrop-blur-md px-6 py-3 rounded-2xl border border-white/30 text-center shadow-inner">
                        <span class="text-lg font-bold text-white tracking-wide">Peternakan</span>
                    </div>
                </div>

            </div>
        </div>

        <!-- BERITA TERKINI -->
        <div class="mt-20">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-8 md:mb-10 text-center md:text-left tracking-tight">
                Berita terkini</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">

                <div class="flex flex-col group cursor-pointer">
                    <div class="overflow-hidden rounded-3xl mb-5 shadow-sm">
                        <img src="{{ asset('assets/images/berita.png') }}" alt="Berita 1"
                            class="h-56 md:h-64 object-cover w-full group-hover:scale-105 transition transform duration-500">
                    </div>
                    <h3 class="font-bold text-xl leading-snug mb-3 text-gray-900 group-hover:text-green-800 transition">
                        Pemantauan Laut Jadi Strategi Nelayan Tingkatkan Hasil Panen</h3>
                    <p class="text-gray-500 text-sm leading-relaxed line-clamp-3">Teks berita bisa dengan mudah ditemui
                        dalam kehidupan sehari-hari. Contoh teks berita dapat dilihat dalam rangkuman berikut ini.</p>
                </div>

                <div class="flex flex-col group cursor-pointer">
                    <div class="overflow-hidden rounded-3xl mb-5 shadow-sm">
                        <img src="{{ asset('assets/images/berita.png') }}" alt="Berita 2"
                            class="h-56 md:h-64 object-cover w-full group-hover:scale-105 transition transform duration-500">
                    </div>
                    <h3 class="font-bold text-xl leading-snug mb-3 text-gray-900 group-hover:text-green-800 transition">
                        Pemantauan Laut Jadi Strategi Nelayan Tingkatkan Hasil Panen</h3>
                    <p class="text-gray-500 text-sm leading-relaxed line-clamp-3">Teks berita bisa dengan mudah ditemui
                        dalam kehidupan sehari-hari. Contoh teks berita dapat dilihat dalam rangkuman berikut ini.</p>
                </div>

                <div class="flex flex-col group cursor-pointer">
                    <div class="overflow-hidden rounded-3xl mb-5 shadow-sm">
                        <img src="{{ asset('assets/images/berita.png') }}" alt="Berita 3"
                            class="h-56 md:h-64 object-cover w-full group-hover:scale-105 transition transform duration-500">
                    </div>
                    <h3 class="font-bold text-xl leading-snug mb-3 text-gray-900 group-hover:text-green-800 transition">
                        Pemantauan Laut Jadi Strategi Nelayan Tingkatkan Hasil Panen</h3>
                    <p class="text-gray-500 text-sm leading-relaxed line-clamp-3">Teks berita bisa dengan mudah ditemui
                        dalam kehidupan sehari-hari. Contoh teks berita dapat dilihat dalam rangkuman berikut ini.</p>
                </div>

            </div>
        </div>

    </div>
@endsection
