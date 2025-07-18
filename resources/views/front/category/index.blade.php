@extends('front.layout.template')

@push('meta-seo')
<meta name="description" value="Category Blog lensamu, seputar opini kader IMM FEB">
<meta name="keyword" value="category lensa, kategori lensamu, category lensamu.id">
<meta property="og:title" content="Category {{ $category . " - RvinDev"}} "/>
<meta property="og:url" value="{{ url()->current() }}">
<meta property="og:site_name" content="Blog RvinDev">
<meta property="og:description" value="Category Blog lensamu, seputar opini kader IMM FTD">
<meta property="og:image" value="http://127.0.0.1:8000/front/img/lensamu.png">
@endpush

@section('title', 'Category ' . $category . '- RvinDev')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="mb-3">
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Search article..." />
                    <button class="btn btn-primary" id="button-search" type="submit">Submit</button>
                </div>
            </form>
        </div>

        <p>Showing articles with category : <b>{{ $category }}</b></p>

        <div class="row">
            @forelse ($articles as $item)
                <div class="col-lg-4" data-aos="flip-up">
                    <!-- Blog post-->
                    <div class="card mb-4 shadow-sm">
                        <a href="{{ url('p/' . $item->slug) }}"><img class="card-img-top post-img"
                                src="{{ asset('storage/back/' . $item->img) }}" alt="..." /></a>
                        <div class="card-body card-height">
                            <div class="small text-muted">
                                {{ $item->created_at->format('d-m-Y') }} | {{ $item->User->name }} |
                                <a href="{{ url('category/' . $item->Category->slug) }}">{{ $item->Category->name }}</a>
                            </div>
                            <h2 class="card-title h4">{{ $item->title }}</h2>
                            <p class="card-text">{{ Str::limit(strip_tags($item->desc), 200, '...') }}</p>
                            <a class="btn btn-primary" href="{{ url('p/' . $item->slug) }}">Read more →</a>
                        </div>
                    </div>
                </div>
            @empty
                <h3>Not Found</h3>
            @endforelse
        </div>
        {{ $articles->links() }}
    </div>
@endsection
