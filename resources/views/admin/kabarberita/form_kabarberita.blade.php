@extends('admin.layouts.admin_master')

@section('page-title', 'Tambah Kabar Berita')

@section('content')
    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
            <h6 class="fw-semibold mb-0">Kabar Berita</h6>
        </div>

        <div class="row gy-4">
            <div class="col-lg-8">
                <div class="card mt-4 shadow-sm rounded-4">
                    <div class="card-header border-bottom">
                        <h6 class="text-lg mb-0">Add New Kabar Berita</h6>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('admin.kabarberita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- JUDUL --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Judul Berita</label>
                                <input type="text" name="judul"
                                    class="form-control @error('judul') is-invalid @enderror"
                                    placeholder="Masukan Judul Berita..." value="{{ old('judul') }}">
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- BODY BERITA --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Isi Berita</label>
                                <textarea id="body_berita" name="body_berita" class="form-control @error('body_berita') is-invalid @enderror"
                                    rows="5">{{ old('body_berita') }}</textarea>
                            </div>

                            {{-- IMAGE --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Upload Thumbnail</label>
                                <input type="file" name="image" class="form-control">
                                @error('image')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-primary rounded-3 shadow-sm mt-2">
                                Submit
                            </button>

                        </form>

                    </div>
                </div>
            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4">

                <div class="card shadow-sm rounded-4">

                    <div class="card-header border-bottom">
                        <h6 class="text-lg mb-0">Latest Posts</h6>
                    </div>

                    <div class="card-body p-3">

                        @forelse(($latestPosts ?? collect())->take(3) as $post)
                            <div class="latest-post-item">

                                <img src="{{ asset('assets/images/kabarberita/' . $post->image) }}"
                                    class="latest-post-thumb">

                                <div>

                                    <a href="{{ route('admin.kabarberita.show', $post->id_kabar_berita) }}"
                                        class="text-dark text-decoration-none">

                                        <div class="latest-post-title">
                                            {{ $post->judul }}
                                        </div>

                                    </a>

                                    <div class="latest-post-desc">
                                        {{ Str::limit(strip_tags($post->body_berita), 70) }}
                                    </div>

                                </div>

                            </div>

                        @empty

                            <p class="text-muted">Belum ada berita</p>
                        @endforelse

                    </div>

                </div>

            </div>
        </div>
        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

        <script>
            ClassicEditor
                .create(document.querySelector('#body_berita'))
                .catch(error => console.error(error));
        </script>

    @endsection
