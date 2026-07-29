<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="robots" content="index, follow">
    @stack('meta-seo')
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('front/img/lensamutitle.png') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('front/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/css/custom.css') }}" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    @stack('css')
</head>

<body>
    <div class="min-vh-100 d-flex flex-column justify-content-between">
        <!-- Responsive navbar-->
        @include('front.layout.navbar')

        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">{{ $config['title'] }}</h1>
                    <p class="lead mb-0">{{ $config['caption'] }}</p>
                </div>
            </div>
        </header>

        <div class="mb-4 container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <a href="https://domainesia.com" target="_blank" rel="noopener noreferrer"><img
                            src="{{ $config['ads_header'] }}" alt="ads_header" class="img-fluid" width="100%"></a>
                </div>
                <div class="col-3"></div>
            </div>
        </div>

        @yield('content')

        <div class="mb-4 container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <a href="https://domainesia.com" target="_blank" rel="noopener noreferrer"><img
                            src="{{ $config['ads_footer'] }}" alt="ads_footer" class="img-fluid" width="100%"></a>
                </div>
                <div class="col-3"></div>
            </div>
        </div>

        <!-- Footer-->
        <footer class="bg-dark text-white pt-5">
            <div class="container">
                <div class="row g-4">

                    <!-- Brand -->
                    <div class="col-md-3">
                        <h5 class="fw-bold">LensaMU</h5>

                        <p class="mb-1">
                            Gerakan intelektual–profetik mahasiswa Muhammadiyah yang membangun kader kritis,
                            berintegritas, dan berkemajuan.
                        </p>

                        <p class="fw-semibold fst-italic text-white-50">
                            “Fastabiqul Khairat”
                        </p>
                    </div>

                    <!-- Learn More -->
                    <div class="col-md-3">
                        <h5 class="fw-bold">LEARN MORE</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white text-decoration-none">Tentang IMM</a></li>
                            <li><a href="#" class="text-white text-decoration-none">Sejarah & Profil</a></li>
                            <li><a href="#" class="text-white text-decoration-none">Struktur Organisasi</a></li>
                            <li><a href="#" class="text-white text-decoration-none">Dokumentasi</a></li>
                            <li><a href="#" class="text-white text-decoration-none">Hubungi Kami</a></li>
                        </ul>
                    </div>

                    <!-- Follow Us -->
                    <div class="col-md-3">
                        <h5 class="fw-bold">FOLLOW US</h5>
                        <p class="mb-2">Ikuti LensaMU untuk mendapatkan update opini terbaru, dan informasi
                            menarik lainnya.</p>
                        <a href="https://www.facebook.com/immitbadjkt" class="text-white me-3"><i
                                class="fab fa-facebook fa-lg"></i></a>
                        <a href="https://youtube.com/@pk.immfebitbadjakarta7863?si=Z-RTb6BgI0tCunM8"
                            class="text-white me-3"><i class="fab fa-youtube fa-lg"></i></a>
                        <a href="https://www.instagram.com/immfebitbadjkt" class="text-white me-3"><i
                                class="fab fa-instagram fa-lg"></i></a>
                        <a href="https://www.tiktok.com/@immfebitbadjkt" target="_blank" class="text-white me-3">
                            <i class="fab fa-tiktok fa-lg"></i>
                        </a>
                    </div>

                    <!-- Alamat -->
                    <div class="col-md-3">
                        <h5 class="fw-bold">ALAMAT KAMI</h5>
                        <p>
                            Jl. Ir. H. Juanda No.77, Cireundeu, Ciputat Timur,<br>
                            Tangerang Selatan, Banten 15419<br><br>
                            Email: pkimmfebitbadjakarta@gmail.com<br>
                        </p>

                        <div class="ratio ratio-16x9">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.046042583834!2d106.76179877564509!3d-6.755361066169665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c784f7f3f1d3%3A0x9bc365c5c4f8b9f0!2sJl.%20Ir.%20H.%20Juanda%20No.77%2C%20Cireundeu%2C%20Kec.%20Ciputat%20Tim.%2C%20Kota%20Tangerang%20Selatan%2C%20Banten%2015419!5e0!3m2!1sen!2sid!4v1700000000000"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                            </iframe>
                        </div>
                    </div>

                </div>

                <hr class="border-secondary" />
                <div class="text-center">
                    <p class="mb-0">Copyright &copy; {{ $config['footer'] }} {{ date('Y') }}</p>
                </div>
            </div>

            <!-- Tombol Back to Top -->
            <button onclick="scrollToTop()" class="btn btn-danger position-fixed" id="backToTopBtn"
                style="bottom: 20px; right: 20px; display: none; z-index: 999;">
                ↑
            </button>
        </footer>

        <!-- Script Scroll ke Atas -->
        <script>
            // Tampilkan tombol saat scroll turun
            window.onscroll = function() {
                const btn = document.getElementById("backToTopBtn");
                if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                    btn.style.display = "block";
                } else {
                    btn.style.display = "none";
                }
            };

            // Scroll halus ke atas
            function scrollToTop() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }
        </script>

    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('front/js/scripts.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    @stack('js')
</body>

</html>
