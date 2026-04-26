@extends('layouts.master')

@section('title', 'Tentang Kami - Tani Merdeka Indonesia')

@section('content')

    {{-- FIX CKEDITOR STYLE (JANGAN DIHAPUS) --}}
    <style>
        .ck-content h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .ck-content h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .ck-content h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .ck-content p {
            margin-bottom: 10px;
            line-height: 1.7;
        }

        .ck-content ul {
            list-style: disc;
            padding-left: 20px;
            margin-bottom: 10px;
        }

        .ck-content ol {
            list-style: decimal;
            padding-left: 20px;
            margin-bottom: 10px;
        }

        .ck-content li {
            margin-bottom: 5px;
        }

        .ck-content strong {
            font-weight: 600;
        }
    </style>

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

        {{-- DESKRIPSI --}}
        <div class="my-16 max-w-4xl mx-auto text-center">
            <div class="ck-content text-gray-700 text-base md:text-lg leading-relaxed">
                {!! $data?->deskripsi_program ?? '-' !!}
            </div>
        </div>

        {{-- VISI MISI --}}
        <div class="mt-20 grid grid-cols-1 md:grid-cols-[1.3fr_1fr] gap-6 md:gap-8 items-stretch">
            <div class="space-y-10">

                {{-- VISI --}}
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Visi</h2>
                    <div class="ck-content text-gray-600 text-base md:text-lg leading-relaxed">
                        {!! $data?->visi ?? '-' !!}
                    </div>
                </div>

                {{-- MISI --}}
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Misi</h2>
                    <div class="ck-content text-gray-600 text-base md:text-lg leading-relaxed">
                        {!! $data?->misi ?? '-' !!}
                    </div>
                </div>

            </div>

            <div class="flex justify-center md:justify-end">
                <img src="{{ $data?->image ? asset('images/tentang-kami/' . $data->image) : asset('assets/images/background.png') }}"
                    class="rounded-3xl w-full max-w-sm md:max-w-md h-[450px] object-cover shadow-md" alt="Visi Misi">
            </div>
        </div>

        {{-- TEAM --}}
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
                @if(isset($struktur_organisasi) && $struktur_organisasi->count() > 0)
                    @foreach ($struktur_organisasi as $org)
                        <div
                            class="group bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-1">
                            <div class="aspect-[3/4] overflow-hidden bg-gray-100">
                                <img src="{{ asset('images/struktur-organisasi/' . $org->image) }}"
                                    class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-500"
                                    alt="{{ $org->nama_lengkap }}">
                            </div>
                            <div class="p-4 text-center">
                                <h3 class="font-semibold text-base md:text-lg text-gray-900 leading-snug">
                                    {{ $org->nama_lengkap }}
                                </h3>
                                <p class="text-green-600 font-medium text-sm mt-1">
                                    {{ $org->jabatan }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-500 col-span-full text-center py-8">Belum ada data tim yang ditambahkan.</p>
                @endif
            </div>
        </div>
    </div>

@endsection
