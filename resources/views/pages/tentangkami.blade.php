@extends('layouts.master')

@section('title', 'Tentang Kami - Tani Merdeka Indonesia')

@section('content')
<div class="px-6 md:px-16 py-8 space-y-16">

    <div class="relative rounded-3xl overflow-hidden shadow-lg flex items-center min-h-[300px] md:min-h-[350px]">
        <img src="{{ asset('assets/images/background.png') }}"
            class="absolute inset-0 w-full h-full object-cover" alt="Tentang Kami">

        <div class="absolute inset-0 bg-gradient-to-r from-[#1f4d2e]/90 via-[#1f4d2e]/70 to-transparent"></div>

        <div class="relative z-10 text-white px-8 md:px-14 py-10 max-w-xl">
            <h1 class="text-3xl md:text-5xl font-extrabold leading-tight mb-4">
                Tentang <br> Tani Merdeka
            </h1>
            <p class="text-sm md:text-base opacity-90 leading-relaxed">
                Layanan pemerintah yang mendukung pelaku usaha pertanian, perikanan,
                dan peternakan melalui informasi pendampingan dan kolaborasi.
            </p>
        </div>
    </div>

    <!-- DESKRIPSI -->
    <div class="max-w-4xl mx-auto text-center">
        <p class="text-gray-700 leading-relaxed text-base md:text-lg">
            Pasar Tani Merdeka merupakan layanan yang disediakan untuk memfasilitasi
            pemasaran hasil pertanian, perikanan, dan peternakan dengan mempertemukan
            pelaku usaha secara langsung dengan pembeli. Layanan ini bertujuan memperluas
            akses pasar, mendukung distribusi hasil produksi, serta mendorong harga yang
            lebih adil dan transparan bagi pelaku sektor pangan dan masyarakat.
        </p>
    </div>

    <!-- MISI VISI -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

        <!-- TEXT -->
        <div class="space-y-10">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold mb-3">Misi</h2>
                <p class="text-gray-600 leading-relaxed">
                    Menjadi layanan pasar yang terpercaya dalam mendukung pemasaran
                    hasil pertanian, perikanan, dan peternakan guna meningkatkan
                    kesejahteraan pelaku sektor pangan dan masyarakat.
                </p>
            </div>

            <div>
                <h2 class="text-2xl md:text-3xl font-bold mb-3">Visi</h2>
                <p class="text-gray-600 leading-relaxed">
                    Menjadi layanan pasar yang terpercaya dalam mendukung pemasaran
                    hasil pertanian, perikanan, dan peternakan guna meningkatkan
                    kesejahteraan pelaku sektor pangan dan masyarakat.
                </p>
            </div>
        </div>

        <!-- IMAGE -->
        <div class="flex justify-center md:justify-end">
            <img src="{{ asset('assets/images/background.png') }}"
                class="rounded-3xl w-full max-w-sm md:max-w-md object-cover shadow-md"
                alt="Visi Misi">
        </div>
    </div>

    <!-- TEAM -->
    <div>
        <h2 class="text-2xl md:text-3xl font-bold mb-8">Team</h2>

        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8">

            <!-- CARD -->
            @for ($i = 0; $i < 4; $i++)
                <div class="text-center">
                    <div class="rounded-2xl overflow-hidden shadow-sm mb-3">
                        <img src="{{ asset('assets/images/team.png') }}"
                            class="w-full h-52 object-cover"
                            alt="Team">
                    </div>
                    <h3 class="font-semibold text-gray-900">Budiman Sugiarto</h3>
                    <p class="text-gray-500 text-sm">Marketing</p>
                </div>
            @endfor

        </div>
    </div>

</div>
@endsection
