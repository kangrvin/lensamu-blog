@extends('front.layout.template')

@push('meta-seo')
    <meta name="author" content="{{ $article->User->name }}" />
    <meta name="description" value="{{ Str::limit(strip_tags($article->desc), 150, '...') }}">
    <meta name="keyword" value="{{ $article->title . '- RvinDev' }}">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $article->title . '- RvinDev' }}" />
    <meta property="og:url" value="{{ url()->current() }}">
    <meta property="og:site_name" content="Blog RvinDev">
    <meta property="og:description" value="{{ Str::limit(strip_tags($article->desc), 150, '...') }}">
    <meta property="og:image" value="{{ asset('storage/back/' . $article->img) }}">
@endpush

@section('title', $article->title . '- lensamu.id')

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
                            <p style="font-size: 20px; font-weight: bold; margin-top: 30px;">Share this</p>

                            <style>
                                .share-buttons {
                                    display: flex;
                                    gap: 10px;
                                    flex-wrap: wrap;
                                    margin-top: 12px;
                                }

                                .share-buttons a,
                                .share-buttons button {
                                    display: flex;
                                    align-items: center;
                                    gap: 6px;
                                    padding: 8px 14px;
                                    font-size: 15px;
                                    border-radius: 8px;
                                    font-weight: 600;
                                    border: none;
                                    cursor: pointer;
                                }

                                .btn-facebook {
                                    background: #1877f2;
                                    color: white;
                                }

                                .btn-whatsapp {
                                    background: #25d366;
                                    color: white;
                                }

                                .btn-instagram {
                                    background: #E1306C;
                                    color: white;
                                }

                                .btn-facebook:hover,
                                .btn-whatsapp:hover,
                                .btn-instagram:hover {
                                    opacity: 0.8;
                                }

                                @media (max-width: 576px) {
                                    .share-buttons {
                                        gap: 12px;
                                    }
                                }
                            </style>

                            <div class="share-buttons">

                                <a class="btn-facebook" href="https://www.facebook.com/sharer.php?u={{ url()->current() }}"
                                    target="_blank">
                                    <i class="fab fa-facebook"></i> Facebook
                                </a>

                                <a class="btn-whatsapp" href="https://api.whatsapp.com/send?text={{ url()->current() }}"
                                    target="_blank">
                                    <i class="fab fa-whatsapp"></i> WhatsApp
                                </a>

                                <button class="btn-instagram" onclick="shareToInstagram()">
                                    <i class="fab fa-instagram"></i> Instagram
                                </button>

                            </div>
                            <script>
                                function shareToInstagram() {
                                    const articleUrl = "{{ url()->current() }}";

                                    // Copy link otomatis
                                    navigator.clipboard.writeText(articleUrl);

                                    // Deteksi Android / iOS / Desktop
                                    const ua = navigator.userAgent.toLowerCase();

                                    // Deep link Instagram (Android & iOS)
                                    const instagramAppUrl = "instagram://story-camera";
                                    const instagramWebFallback = "https://www.instagram.com/create/story/";

                                    if (ua.includes("android")) {
                                        // Android → coba buka aplikasi Instagram
                                        window.location.href = instagramAppUrl;

                                        // Jika gagal (Instagram tidak terpasang), buka web
                                        setTimeout(() => {
                                            window.open(instagramWebFallback, "_blank");
                                        }, 800);

                                        alert("Link artikel sudah disalin! Buka Instagram lalu paste link di Story.");
                                    } else if (ua.includes("iphone") || ua.includes("ipad")) {
                                        // iOS → buka aplikasi Instagram
                                        window.location.href = instagramAppUrl;

                                        setTimeout(() => {
                                            window.open(instagramWebFallback, "_blank");
                                        }, 800);

                                        alert("Link artikel sudah disalin! Tempelkan link di Story Instagram.");
                                    } else {
                                        // Desktop fallback
                                        window.open(instagramWebFallback, "_blank");
                                        alert("Link artikel telah disalin. Paste manual ke Instagram di HP.");
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widgets-->
            @include('front.layout.side-widget')
        </div>
    </div>
@endsection
