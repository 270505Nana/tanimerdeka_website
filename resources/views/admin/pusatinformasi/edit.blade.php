@extends('admin.layouts.admin_master')
@section('content')
    <div class="container">
        <h3 class="mb-4">Edit Pusat Informasi</h3>
        <form action="{{ route('admin.pusat-informasi.update', $data->id_informasi) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Kategori Informasi</label>
                <select name="id_kategori" class="form-control">
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id_kategori }}" @if ($data->id_kategori == $k->id_kategori) selected @endif>
                            {{ $k->jenis }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Isi Informasi</label>
                <textarea name="body" class="form-control" rows="5">

{{ $data->body }}

</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar Saat Ini</label>
                <br>
                <img src="{{ asset('storage/' . $data->image) }}" width="200">
            </div>

            <div class="mb-3">
                <label class="form-label">Ganti Gambar</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('admin.pusat-informasi.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </form>
    </div>
@endsection
