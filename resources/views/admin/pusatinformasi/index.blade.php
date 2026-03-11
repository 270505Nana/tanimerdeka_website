@extends('admin.layouts.admin_master')
@section('content')
    <div class="container">

        <h3 class="mb-4">Pusat Informasi</h3>
        <a href="{{ route('admin.pusat-informasi.create') }}" class="btn btn-primary mb-4">
            Tambah Informasi
        </a>

        <div class="row">
            @foreach ($data as $item)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top"
                            style="height:180px; object-fit:cover;">
                        <div class="card-body">
                            <span class="badge bg-secondary mb-2">
                                {{ $item->kategori_informasi->jenis }}
                            </span>

                            <p class="text-muted small">
                                {{ $item->created_at->format('d M Y') }}
                            </p>
                            <p>
                                {{ Str::limit($item->body, 100) }}
                            </p>
                            <a href="{{ route('admin.pusat-informasi.show', $item->id_informasi) }}">
                                Read More >>
                            </a>

                            <div class="mt-3">
                                <a href="{{ route('admin.pusat-informasi.edit', $item->id_informasi) }}"
                                    class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <form action="{{ route('admin.pusat-informasi.destroy', $item->id_informasi) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
