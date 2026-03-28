@extends('admin.layouts.admin_master')

@section('content')
    <div class="container py-4">

        <h4 class="mb-4">Pusat Informasi</h4>
        <a href="{{ route('admin.pusat-informasi.create') }}" class="btn btn-primary mb-3">
            Tambah Informasi
        </a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Isi Informasi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->kategori_informasi->jenis }}</td>
                        <td>{!! Str::limit($row->body, 100) !!}</td>
                        <td>
                            @if ($row->image)
                                <img src="{{ asset('images/pusat-informasi/' . $row->image) }}" width="80"
                                    alt="{{ $row->jenis ?? 'Informasi' }}">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.pusat-informasi.show', $row->id_informasi) }}"
                                class="btn btn-info btn-sm">
                                Detail
                            </a>

                            <a href="{{ route('admin.pusat-informasi.edit', $row->id_informasi) }}"
                                class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('admin.pusat-informasi.destroy', $row->id_informasi) }}" method="POST"
                                style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
