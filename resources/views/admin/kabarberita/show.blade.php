@extends('admin.layouts.admin_master')

@section('page-title', 'Detail Berita')

@section('content')

    <div class="dashboard-main-body">

        <div class="d-flex justify-content-between mb-4">

            <h5>Detail Kabar Berita</h5>

            <a href="{{ route('admin.kabarberita.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </div>


        <div class="card shadow-sm">

            @if ($berita->image)
                <img src="{{ asset('assets/images/kabarberita/'.$berita->image) }}" class="card-img-top"
                    style="max-height:400px; object-fit:cover;">
            @endif


            <div class="card-body">

                <h3 class="mb-3">
                    {{ $berita->judul }}
                </h3>


                <div class="text-muted">

                    {!! $berita->body_berita !!}

                </div>

            </div>

        </div>

    </div>

@endsection
