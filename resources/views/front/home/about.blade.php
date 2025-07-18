@extends('front.layout.template')

@push('meta-seo')
<meta name="description" value="About Blog lensamu, seputar opini kader IMM FEB">
<meta name="keyword" value="about lensa, tentang lensamu, apa itu lensamu.id">
<meta property="og:title" content="About Blog - RvinDev">
<meta property="og:url" value="{{ url()->current() }}">
<meta property="og:site_name" content="Blog RvinDev">
<meta property="og:description" value="About Blog lensamu, seputar opini kader IMM FTD">
<meta property="og:image" value="http://127.0.0.1:8000/front/img/lensamu.png">
@endpush

@section('title', 'About Blog - RvinDev')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8" data-aos="zoom-out">
                <!-- Featured blog post-->
                <div class="card mb-4 shadow-sm">
                    <a href="{{ asset('front/img/laravel.png') }}"><img class="card-img-top featured-img"
                            src="{{ asset('front/img/laravel.png') }}" alt="About Blog" /></a>
                    <div class="card-body">
                        <div class="small text-muted">{{ date('d/m/Y') }}</div>
                        <h2 class="card-title">About Blog</h2>
                        <p class="card-text">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum adipisci
                            obcaecati consequatur sequi recusandae enim illum laborum beatae! Quia numquam possimus nesciunt
                            molestias ullam! Corporis ratione minima tempore aspernatur quia!
                        </p>

                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero, et! Consectetur, debitis.
                            Veritatis, consectetur, voluptatum possimus ducimus harum assumenda veniam quae soluta unde iure
                            quam iusto sit fugit, exercitationem quaerat!
                        </p>

                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et vitae obcaecati ipsum vero natus
                            minus quibusdam officia architecto assumenda perferendis, consequuntur, enim fugit ipsa alias
                            voluptatum molestiae aspernatur at pariatur!
                        </p>

                        <ul>
                            <li><a href="https://youtube.com/@ervin">Youtube</a></li>
                            <li><a href="https://facebook.com">Facebook</a></li>
                            <li><a href="https://instagram.com">Instagram</a></li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Side widgets-->
            @include('front.layout.side-widget')
        </div>
    </div>
@endsection
