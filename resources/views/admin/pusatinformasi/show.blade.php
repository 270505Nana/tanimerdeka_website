@extends('admin.layouts.admin_master')
@section('content')
    <div class="container">
        <h3 class="mb-4">Detail Pusat Informasi</h3>
        <div class="card">
            <img src="{{ asset('storage/' . $data->image) }}" class="card-img-top" style="height:350px; object-fit:cover;">
            <div class="card-body">
                <span class="badge bg-info mb-2">
                    {{ $data->kategori_informasi->jenis }}
                </span>
                <p class="text-muted">
                    {{ $data->created_at->format('d M Y') }}
                </p>
                <p>
                    {{ $data->body }}
                </p>
                <a href="{{ route('admin.pusat-informasi.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </div>

    </div>
@endsection
