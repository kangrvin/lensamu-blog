<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Navbar Manual Dropdown</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        .navbar {
            background-color: white !important;
            transition: top 0.3s ease-in-out;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .navbar.hide {
            top: -100px;
        }

        .nav-link {
            color: #003366 !important;
            transition: 0.3s;
        }

        .nav-link:hover {
            color: white !important;
            background-color: #dc3545 !important;
            border-radius: 5px;
        }

        /* DROPDOWN */
        .category-list {
            display: none;
            position: absolute;
            background-color: white;
            padding: 10px;
            border: 1px solid #ccc;
            list-style: none;
            top: 100%;
            left: 0;
            z-index: 1000;
            min-width: 200px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .category-list li a {
            display: block;
            color: #003366;
            padding: 5px 10px;
            text-decoration: none;
        }

        .category-list li a:hover {
            background-color: #dc3545;
            color: white;
            border-radius: 5px;
        }

        /* Hover desktop */
        @media (min-width: 992px) {
            .category-toggle:hover .category-list {
                display: block;
            }
        }

        /* Click mobile */
        .category-toggle.active .category-list {
            display: block !important;
        }

        /* Social icons */
        .social-icons a {
            color: #003366;
            margin-left: 10px;
            font-size: 1.2rem;
        }

        .social-icons a:hover {
            color: #dc3545;
        }

        .category-list hr {
            margin: 5px 0;
            border: none;
            border-top: 1px solid #ccc;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">

            <a class="navbar-brand me-3" href="{{ url('/') }}">
                <img src="{{ asset('front/img/lensamu.png') }}" alt="Logo"
                    style="height: 80px; object-fit: contain;">
            </a>

            <!-- Toggle (Mobile) -->
            <button id="navToggle" class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse justify-content-between" id="navbarContent">

                <ul class="navbar-nav mb-2 mb-lg-0">

                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/articles') }}">Articles</a></li>

                    <!-- Categories Dropdown -->
                    <li class="nav-item position-relative category-toggle">
                        <a class="nav-link category-btn" href="#">Categories ▾</a>

                        <ul class="category-list">
                            @foreach ($category_navbar as $item)
                                <li><a href="{{ url('category/' . $item->slug) }}">{{ $item->name }}</a></li>
                            @endforeach

                            <li>
                                <hr>
                            </li>
                            <li><a href="{{ url('all-category') }}">All Categories</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                </ul>

                <!-- Social Icons -->
                <div class="d-flex align-items-center social-icons">
                    <a href="https://www.facebook.com/immitbadjkt"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/immfebitbadjkt"><i class="fab fa-instagram"></i></a>
                    <a href="https://youtube.com/@pk.immfebitbadjakarta7863"><i class="fab fa-youtube"></i></a>
                    <a href="https://www.tiktok.com/@immfebitbadjkt"><i class="fab fa-tiktok"></i></a>
                </div>

            </div>
        </div>
    </nav>

    <!-- SCRIPT -->
    <script>
        // CATEGORY DROPDOWN CLICK FIX
        const categoryBtns = document.querySelectorAll(".category-btn");
        const toggler = document.getElementById("navToggle");
        const navbarCollapse = document.getElementById("navbarContent");

        categoryBtns.forEach(btn => {
            btn.addEventListener("click", function(e) {
                e.preventDefault();

                // pastikan ketika dropdown dibuka, menu masih bisa ditutup
                this.parentElement.classList.toggle("active");
            });
        });

        // KETIKA USER MENUTUP MENU, dropdown ikut menutup
        navbarCollapse.addEventListener("hidden.bs.collapse", function() {
            document.querySelectorAll(".category-toggle.active")
                .forEach(item => item.classList.remove("active"));
        });

        // KLIK DI LUAR → tutup dropdown (khusus mobile)
        document.addEventListener("click", function(e) {
            if (!e.target.closest(".category-toggle") && !toggler.contains(e.target)) {
                document.querySelectorAll(".category-toggle.active")
                    .forEach(item => item.classList.remove("active"));
            }
        });

        // Navbar hide on scroll
        let lastScrollTop = 0;
        const navbar = document.querySelector('.navbar');

        window.addEventListener("scroll", function() {
            const st = window.pageYOffset || document.documentElement.scrollTop;

            if (st > lastScrollTop + 5) navbar.classList.add("hide");
            else if (st < lastScrollTop - 5 || st <= 0) navbar.classList.remove("hide");

            lastScrollTop = st <= 0 ? 0 : st;
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
