@extends('layouts.master')

@section('title','Kabar Berita - Tani Merdeka Indonesia')

@section('content')
<!-- css -->
<link rel="stylesheet" href="{{ asset('assets/css/kabar-berita.css') }}">

<div class="kb-container">

    <!-- HERO SAMA BERITA POPULER -->
    <div class="kb-top-section">
        <div class="kb-hero-card">
            <img src="{{ asset('assets/images/kabarberita.png') }}" class="kb-hero-img" alt="Pemerintah Percepat Program">
            <div class="kb-hero-overlay">
                <h2 class="kb-hero-title">Pemerintah Percepat Program Pendampingan untuk Petani Lokal</h2>
            </div>
        </div>

        <!-- BERITA POPULER -->
        <div class="kb-populer-wrapper">
            <h4 class="kb-section-title-small">Berita Populer</h4>
            <div class="kb-populer-list">
                
                <!-- Card Populer 1 -->
                <div class="kb-populer-card">
                    <img src="{{ asset('assets/images/kabarberita.png') }}" class="kb-populer-img" alt="Populer 1">
                    <div class="kb-populer-content">
                        <span class="kb-populer-date">Nov 12, 2026</span>
                        <h6 class="kb-populer-title">Upaya Petani Menjaga Produktivitas Sayuran di Tengah Perubahan Iklim</h6>
                    </div>
                </div>

                <!-- Card Populer 2 -->
                <div class="kb-populer-card">
                    <img src="{{ asset('assets/images/kabarberita.png') }}" class="kb-populer-img" alt="Populer 2">
                    <div class="kb-populer-content">
                        <span class="kb-populer-date">Nov 12, 2026</span>
                        <h6 class="kb-populer-title">Upaya Petani Menjaga Produktivitas Sayuran di Tengah Perubahan Iklim</h6>
                    </div>
                </div>

                <!-- Card Populer 3 -->
                <div class="kb-populer-card">
                    <img src="{{ asset('assets/images/kabarberita.png') }}" class="kb-populer-img" alt="Populer 3">
                    <div class="kb-populer-content">
                        <span class="kb-populer-date">Nov 12, 2026</span>
                        <h6 class="kb-populer-title">Upaya Petani Menjaga Produktivitas Sayuran di Tengah Perubahan Iklim</h6>
                    </div>
                </div>

                <!-- Card Populer 4 -->
                <div class="kb-populer-card">
                    <img src="{{ asset('assets/images/kabarberita.png') }}" class="kb-populer-img" alt="Populer 4">
                    <div class="kb-populer-content">
                        <span class="kb-populer-date">Nov 12, 2026</span>
                        <h6 class="kb-populer-title">Upaya Petani Menjaga Produktivitas Sayuran di Tengah Perubahan Iklim</h6>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- BERITA TERKINI -->
    <div class="kb-section-header">
        <h3 class="kb-section-title">Berita terkini</h3>
        <a href="#" class="kb-read-more">Read More</a>
    </div>

    <div class="kb-terkini-grid">
        @for ($i = 1; $i <= 4; $i++)
        <div class="kb-terkini-card">
            <img src="{{ asset('assets/images/kabarberita.png') }}" class="kb-terkini-img" alt="Berita Terkini">
            <h6 class="kb-terkini-title">Pemantauan Laut Jadi Strategi Nelayan Tingkatkan Hasil Panen</h6>
            <p class="kb-desc">Teks berita bisa dengan mudah ditemui dalam kehidupan sehari-hari. Contoh teks berita dapat dilihat dalam rangkuman berikut ini.</p>
        </div>
        @endfor
    </div>

    <!-- PUSAT INFORMASI -->
    <div class="kb-section-header">
        <h3 class="kb-section-title">Pusat Informasi</h3>
        <a href="#" class="kb-read-more">Read More</a>
    </div>

    <div class="kb-info-grid">
        
        <div class="kb-info-card">
            <span class="kb-badge">UU</span>
            <h5 class="kb-info-title">Pusat Informasi</h5>
            <p class="kb-desc" style="flex-grow: 1;">Teks berita bisa dengan mudah ditemui dalam kehidupan sehari-hari. Contoh teks berita dapat dilihat dalam rangkuman berikut ini.</p>
            <a href="#" class="kb-info-link">Read More</a>
        </div>

        <div class="kb-info-card">
            <span class="kb-badge">Kebijakan Moneter</span>
            <h5 class="kb-info-title">Pusat Informasi</h5>
            <p class="kb-desc" style="flex-grow: 1;">Teks berita bisa dengan mudah ditemui dalam kehidupan sehari-hari. Contoh teks berita dapat dilihat dalam rangkuman berikut ini.</p>
            <a href="#" class="kb-info-link">Read More</a>
        </div>

        <div class="kb-info-card">
            <span class="kb-badge">Kebijakan Fiskal</span>
            <h5 class="kb-info-title">Pusat Informasi</h5>
            <p class="kb-desc" style="flex-grow: 1;">Teks berita bisa dengan mudah ditemui dalam kehidupan sehari-hari. Contoh teks berita dapat dilihat dalam rangkuman berikut ini.</p>
            <a href="#" class="kb-info-link">Read More</a>
        </div>
    </div>

</div>
@endsection