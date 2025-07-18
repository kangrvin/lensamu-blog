@extends('front.layout.template')

@push('meta-seo')
<meta name="description" value="Contact Blog lensamu, seputar opini kader IMM FEB">
<meta name="keyword" value="contact lensa, kontak lensamu, contact lensamu.id">
<meta property="og:title" content="Contact Blog - RvinDev">
<meta property="og:url" value="{{ url()->current() }}">
<meta property="og:site_name" content="Blog RvinDev">
<meta property="og:description" value="Contact Blog lensamu, seputar opini kader IMM FTD">
<meta property="og:image" value="http://127.0.0.1:8000/front/img/lensamu.png">
@endpush

@section('title', 'Contact Blog - RvinDev')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8" data-aos="zoom-in">
                <!-- Featured blog post-->
                <div class="card mb-4 shadow-sm">
                    <div class="text-center">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7523490867798!2d106.7664715!3d-6.296240500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f02b8cb8d4a7%3A0x25bb6c7c4a37645b!2sInstitut%20Teknologi%20Dan%20Bisnis%20Ahmad%20Dahlan%20Jakarta!5e0!3m2!1sid!2sid!4v1752578135344!5m2!1sid!2sid"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="card-body">
                        <div class="small text-muted">{{ date('d/m/Y') }}</div>
                        <h2 class="card-title">Contact Blog</h2>
                        <p class="card-text">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum adipisci
                            obcaecati consequatur sequi recusandae enim illum laborum beatae! Quia numquam possimus nesciunt
                            molestias ullam! Corporis ratione minima tempore aspernatur quia!
                        </p>

                        <ul>
                            <li>Phone : {{ $config['phone'] }}</li>
                            <li>Email : {{ $config['email'] }}</li>
                            <li><a href="https://youtube.com/{{ $config['youtube'] }}">Youtube</a></li>
                            <li><a href="https://facebook.com/{{ $config['facebook'] }}">Facebook</a></li>
                            <li><a href="https://instagram.com{{ $config['instagram'] }}">Instagram</a></li>
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
