@extends('admin.layouts.admin_master')

@section('content')
    <div class="container py-4">
        <h4>Detail Pusat Informasi</h4>
        <div class="card p-4">
            <p>
                <strong>Kategori :</strong>
                {{ $data->kategori_informasi->jenis }}
            </p>
            @if ($data->image)
                <img src="{{ asset('images/pusat-informasi/' . $data->image) }}" alt="{{ $data->kategori_informasi->jenis }}"
                    class="img-fluid mb-3" style="max-width:300px">
            @endif

            <div>
                {!! $data->body !!}
            </div>
            <a href="{{ route('admin.pusat-informasi.index') }}" class="btn btn-secondary mt-3">
                Kembali
            </a>
        </div>
    </div>
@endsection
