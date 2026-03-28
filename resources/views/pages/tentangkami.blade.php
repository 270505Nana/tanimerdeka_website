@extends('layouts.master')

@section('title', 'Tentang Kami - Tani Merdeka Indonesia')

@section('content')
    <div class="px-6 md:px-16 py-8">
        <div class="relative rounded-3xl overflow-hidden shadow-lg flex items-center min-h-[350px] md:min-h-[400px]">
            <img src="{{ asset('assets/images/background2.png') }}" class="absolute inset-0 w-full h-full object-cover"
                alt="Hero Banner">

            <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-transparent"></div>

            <div class="relative z-10 w-full md:w-2/3 text-white px-8 md:px-14 py-12 space-y-6 text-left">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight">
                    Tentang <br>Tani Merdeka
                </h1>

                <p class="text-base md:text-lg lg:text-xl leading-relaxed max-w-2xl opacity-90">
                    Layanan pemerintah yang mendukung pelaku usaha pertanian, perikanan,
                    dan peternakan melalui informasi pendampingan dan kolaborasi.
                </p>
            </div>
        </div>

        <div class="mt-16 max-w-4xl mx-auto text-center">
            <p class="text-gray-700 leading-relaxed text-base md:text-lg">
                Pasar Tani Merdeka merupakan layanan yang disediakan untuk memfasilitasi
                pemasaran hasil pertanian, perikanan, dan peternakan dengan mempertemukan
                pelaku usaha secara langsung dengan pembeli. Layanan ini bertujuan memperluas
                akses pasar, mendukung distribusi hasil produksi, serta mendorong harga yang
                lebih adil dan transparan bagi pelaku sektor pangan dan masyarakat.
            </p>
        </div>

        <div class="mt-20 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div class="space-y-10">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Misi</h2>
                    <p class="text-gray-600 leading-relaxed text-base md:text-lg">
                        Menjadi layanan pasar yang terpercaya dalam mendukung pemasaran
                        hasil pertanian, perikanan, dan peternakan guna meningkatkan
                        kesejahteraan pelaku sektor pangan dan masyarakat.
                    </p>
                </div>

                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Visi</h2>
                    <p class="text-gray-600 leading-relaxed text-base md:text-lg">
                        Menjadi layanan pasar yang terpercaya dalam mendukung pemasaran
                        hasil pertanian, perikanan, dan peternakan guna meningkatkan
                        kesejahteraan pelaku sektor pangan dan masyarakat.
                    </p>
                </div>
            </div>
            <div class="flex justify-center md:justify-end">
                <img src="{{ asset('assets/images/background.png') }}"
                    class="rounded-3xl w-full max-w-sm md:max-w-md h-[320px] object-cover shadow-md" alt="Visi Misi">
            </div>
        </div>

<div class="mt-20">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-3 mb-8 md:mb-10">
        <div>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">
                Team
            </h2>
            <p class="text-gray-500 text-sm md:text-base mt-1">
                Tim yang mendukung pengembangan layanan Tani Merdeka.
            </p>
        </div>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-5 md:gap-6">
        @for ($i = 0; $i < 5; $i++)
            <div
                class="group bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-1">
                <div class="aspect-[3/4] overflow-hidden bg-gray-100">
                    <img src="{{ asset('assets/images/team.jpg') }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                        alt="Team">
                </div>
                <div class="p-4 text-center">
                    <h3 class="font-semibold text-base md:text-lg text-gray-900 leading-snug">
                        Budiman Sugiarto
                    </h3>
                    <p class="text-gray-500 text-sm mt-1">
                        Marketing
                    </p>
                </div>
            </div>
        @endfor
    </div>
    </div>
@endsection
