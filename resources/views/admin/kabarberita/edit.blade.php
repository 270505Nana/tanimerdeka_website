@extends('admin.layouts.admin_master')

@section('page-title', 'Edit Berita')
@section('content')
    <div class="dashboard-main-body">
        <h5 class="mb-4">Edit Kabar Berita</h5>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.kabar-berita.update', $berita->id_kabar_berita) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Isi Berita</label>
                        <textarea name="body_berita" rows="6" class="form-control">{{ strip_tags($berita->body_berita) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gambar</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    @if ($berita->image)
                        <div class="mb-3">
                            <img src="{{ asset('assets/images/kabarberita/' . $berita->image) }}"
                                class="img-fluid rounded shadow-sm" style="max-width:220px;">
                        </div>
                    @endif

                    <button class="btn btn-primary">
                        Update Berita
                    </button>
                    <a href="{{ route('admin.kabar-berita.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection
