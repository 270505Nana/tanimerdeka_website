@extends('admin.layouts.admin_master')

@section('page-title', 'Kabar Berita')

@section('content')

    <div class="dashboard-main-body">

        <h5 class="mb-4 fw-bold">Kabar Berita</h5>

        <div class="row g-4">

            @foreach ($posts as $post)
                <div class="col-lg-4 col-md-6">

                    <div class="card border-0 shadow-sm h-100 news-card">

                        @if ($post->image)
                            <img src="{{ asset('assets/images/kabarberita/' . $post->image) }}" class="card-img-top"
                                style="height:180px; object-fit:cover;">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <div class="text-secondary small fw-semibold mb-2 d-flex align-items-center gap-2">
                                <i class="bi bi-calendar-date"></i>
                                {{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}
                            </div>

                            <h5 class="fw-bold news-title">
                                {{ $post->judul }}
                            </h5>
                            <p class="text-secondary small news-excerpt flex-grow-1">
                                {{ \Illuminate\Support\Str::limit(strip_tags($post->body_berita), 120) }}
                            </p>

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="{{ route('admin.kabarberita.show', $post->id_kabar_berita) }}"
                                    class="text-primary fw-semibold text-decoration-none">
                                    Read More »
                                </a>

                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.kabarberita.edit', $post->id_kabar_berita) }}"
                                        class="action-btn text-primary">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('admin.kabarberita.destroy', $post->id_kabar_berita) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="action-btn text-danger border-0 bg-transparent">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            @endforeach

        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>

    </div>

@endsection
