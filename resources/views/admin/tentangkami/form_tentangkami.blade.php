@extends('admin.layouts.admin_master')

@section('content')
    <div class="container py-4">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0 rounded-4">

            {{-- CARD HEADER --}}
            <div class="card-header bg-white border-bottom">
                <h5 class="mb-0 fw-semibold">Informasi Tentang Kami</h5>
            </div>

            <div class="card-body p-4">

                <p class="text-muted small mb-4">
                    Silakan Masukan Informasi Tentang Tani Merdeka.
                </p>

                <form action="{{ route('admin.tentang-kami.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- DESKRIPSI PROGRAM --}}
                    <div class="mb-4">
                        <label for="deskripsi_program" class="form-label fw-semibold">Deskripsi Program</label>

                        <textarea id="deskripsi_program" name="deskripsi_program"
                            class="form-control rounded-3 @error('deskripsi_program') is-invalid @enderror" rows="6">{{ old('deskripsi_program', $data->deskripsi_program ?? '') }}</textarea>

                        @error('deskripsi_program')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- VISI --}}
                    <div class="mb-4">
                        <label for="visi" class="form-label fw-semibold">Visi</label>

                        <textarea id="visi" name="visi" class="form-control rounded-3 @error('visi') is-invalid @enderror"
                            rows="6">{{ old('visi', $data->visi ?? '') }}</textarea>

                        @error('visi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- MISI --}}
                    <div class="mb-4">
                        <label for="misi" class="form-label fw-semibold">Misi</label>

                        <textarea id="misi" name="misi" class="form-control rounded-3 @error('misi') is-invalid @enderror"
                            rows="6">{{ old('misi', $data->misi ?? '') }}</textarea>

                        @error('misi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- IMAGE --}}
                    <div class="mb-4">
                        <label for="image" class="form-label fw-semibold">
                            Upload Logo / Gambar
                            <span class="text-muted small">(Maks: 10MB, JPG/PNG)</span>
                        </label>

                        <input type="file" id="image" name="image" class="form-control rounded-3" accept="image/png, image/jpeg">

                        @if (isset($data->image))
                            <div class="mt-3">
                                <small class="text-muted d-block mb-2">Gambar saat ini:</small>

                                <img src="{{ asset('images/tentang-kami/' . $data->image) }}"
                                    alt="Gambar Tentang Kami" class="img-fluid rounded-3 shadow-sm" style="max-height:200px;">
                            </div>
                        @endif
                    </div>

                    {{-- BUTTON --}}
                    <div class="d-flex justify-content-end gap-3 pt-3 border-top">
                        <button type="reset" class="btn btn-outline-secondary px-4">
                            Reset
                        </button>

                        <button type="submit" class="btn btn-primary px-4">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>

            </div>
        </div>

        {{-- FORM STRUKTUR ORGANISASI --}}
        <div class="card shadow-sm border-0 rounded-4 mt-4">
            <div class="card-header bg-white border-bottom">
                <h5 class="mb-0 fw-semibold">Tambah Struktur Organisasi</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.struktur-organisasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control rounded-3" required>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label fw-semibold">Jabatan</label>
                        <input type="text" id="jabatan" name="jabatan" class="form-control rounded-3" required>
                    </div>
                    <div class="mb-3">
                        <label for="image_org" class="form-label fw-semibold">Upload Foto</label>
                        <input type="file" id="image_org" name="image" class="form-control rounded-3" accept="image/png, image/jpeg" required>
                    </div>
                    <div class="d-flex justify-content-end pt-3">
                        <button type="submit" class="btn btn-success px-4">Simpan Struktur</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    {{-- CKEDITOR --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <script>
        function initEditor(selector) {
            ClassicEditor.create(document.querySelector(selector), {
                toolbar: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'link',
                    'blockQuote',
                    '|',
                    'undo',
                    'redo'
                ]
            });
        }

        initEditor('#deskripsi_program');
        initEditor('#visi');
        initEditor('#misi');
    </script>
@endsection
