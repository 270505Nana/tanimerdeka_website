@extends('admin.layouts.admin_master')

@section('content')

<div class="container py-4">

<h4>{{ isset($data) ? 'Edit Informasi' : 'Tambah Informasi' }}</h4>

<form action="{{ isset($data) ? route('admin.pusat-informasi.update',$data->id_informasi) : route('admin.pusat-informasi.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf
@if(isset($data))
@method('PUT')
@endif

<div class="mb-3">

<label>Kategori</label>

<select name="id_kategori" class="form-control">

<option value="">-- Pilih Kategori --</option>

@foreach($kategori as $k)

<option value="{{ $k->id_kategori }}"
{{ isset($data) && $data->id_kategori==$k->id_kategori ? 'selected' : '' }}>

{{ $k->jenis }}

</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Isi Informasi</label>

<textarea id="body" name="body" class="form-control" rows="6">
{{ isset($data) ? $data->body : '' }}
</textarea>

</div>

<div class="mb-3">

<label>Upload Gambar</label>

<input type="file" name="image" class="form-control">

@if(isset($data->image))
<img src="{{ asset('images/pusat-informasi/'.$data->image) }}" width="120" class="mt-2">
@endif

</div>

<button class="btn btn-primary">
Simpan
</button>

</form>

</div>

<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

<script>
ClassicEditor.create(document.querySelector('#body'));
</script>

@endsection
