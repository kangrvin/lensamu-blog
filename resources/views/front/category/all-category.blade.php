@extends('front.layout.template')

@push('meta-seo')
    <meta name="description" value="All Category Blog lensamu, seputar opini kader IMM FEB">
    <meta name="keyword" value="list category lensa, semua kategori lensamu, daftar kategori lensamu.id">
    <meta property="og:title" content="All Category - RvinDev" />
    <meta property="og:url" value="{{ url()->current() }}">
    <meta property="og:site_name" content="Blog RvinDev">
    <meta property="og:description" value="All Category Blog lensamu, seputar opini kader IMM FTD">
    <meta property="og:image" value="http://127.0.0.1:8000/front/img/lensamu.png">
@endpush

@section('title', 'All Category - lensamu.id')

@section('content')
    <!-- Page content-->
    <div class="container">


        <p>Showing all articles with category :</p>

        <div class="row">
            @foreach ($category as $item)
                <div class="col-lg-3 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="text-center">
                                <span>
                                    <a href="{{ url('category/' . $item->slug) }}" class="text-decoration-none text-dark">
                                        <i class="fas fa-folder fa-5x"></i>
                                    </a>
                                </span>

                                <h5 class="card-title mt-2">
                                    <a href="{{ url('category/' . $item->slug) }}"
                                        class="text-decoration-none text-dark">{{ $item->name }}
                                        ({{ $item->articles_count }})
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- {{ $articles->links() }} --}}
    </div>
@endsection
