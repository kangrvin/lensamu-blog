@extends('front.layout.template')

@push('meta-seo')
<meta name="author" content="{{ $article->User->name }}" />
<meta name="description" value="{{ Str::limit(strip_tags($article->desc), 150, '...') }}">
<meta name="keyword" value="{{ $article->title . '- RvinDev' }}">
<meta property="og:type" content="article"/>
<meta property="og:title" content="{{ $article->title . '- RvinDev' }}"/>
<meta property="og:url" value="{{ url()->current() }}">
<meta property="og:site_name" content="Blog RvinDev">
<meta property="og:description" value="{{ Str::limit(strip_tags($article->desc), 150, '...') }}">
<meta property="og:image" value="{{ asset('storage/back/' . $article->img) }}">
@endpush

@section('title', $article->title . '- RvinDev')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="card mb-4 shadow-sm">
                    <a href="{{ url('p/' . $article->slug) }}"><img class="card-img-top single-img"
                            src="{{ asset('storage/back/' . $article->img) }}" alt="{{ $article->title }}" /></a>
                    <div class="card-body">
                        <div class="small text-muted">
                            <span class="ml-2">{{ $article->created_at->format('d-m-Y') }} |</span>
                            <span class="ml-2">
                                {{ $article->User->name }} |
                                <a
                                    href="{{ url('category/' . $article->Category->slug) }}">{{ $article->Category->name }}</a>
                            </span>
                            <span class="ml-2">{{ $article->views }}</span>x
                        </div>
                        <h1 class="card-title">{{ $article->title }}</h1>
                        <p class="card-text">{!! $article->desc !!}</p>

                        <div class="mt-5">
                            <p style="font-size: 20px"><b>Share this</b></p>

                            <a class="btn btn-primary" href="https://www.facebook.com/sharer.php?u={{ url()->current() }}"
                                target="_blank"><i class="fab fa-facebook"></i> Facebook</a>
                            <a class="btn btn-success" href="https://api.whatsapp.com/send?text={{ url()->current() }}"
                                target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widgets-->
            @include('front.layout.side-widget')
        </div>
    </div>
@endsection
