<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }} - {{ config('app.name', 'Tenzone') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @stack('styles')
    @if($style)
        <link href="{{ asset('assets/css/' . $style) }}" rel="stylesheet">
    @endif
    <link href="{{ asset('assets/css/site.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" type="text/css">

    <!-- Scripts -->
    @stack('scripts')
    <x-scripts.translations />
</head>
<body id="{{ $body }}" class="{{ $class }} body2">

<x-site-menu>
    <x-slot name="style">{{ $menuStyle }}</x-slot>
</x-site-menu>

{{ $slot }}

@stack('modals')

<footer class="tz-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="contact">
                    <h2 class="footer-title">Contact</h2>
                    <a href="#" class="mail">info@thetenacademy</a>
                    <p class="address">58 Howard Street #2 San Francisco<br>contact@edumall.com</p>
                    <a href="#" class="tel">+1 627 9024 6805</a>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3">
                        <h2 class="footer-title">Navigation</h2>
                        <ul class="list-unstyled">
                            <li><a href="#">Programs</a></li>
                            <li><a href="#">Programs</a></li>
                            <li><a href="#">Programs</a></li>
                            <li><a href="#">Programs</a></li>
                            <li><a href="#">Programs</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-lg-3">
                        <h2 class="footer-title">Navigation</h2>
                        <ul class="list-unstyled">
                            <li><a href="#">Programs</a></li>
                            <li><a href="#">Programs</a></li>
                            <li><a href="#">Programs</a></li>
                            <li><a href="#">Programs</a></li>
                            <li><a href="#">Programs</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-lg-3">
                        <h2 class="footer-title">Navigation</h2>
                        <ul class="list-unstyled">
                            <li><a href="#">Programs</a></li>
                            <li><a href="#">Programs</a></li>
                            <li><a href="#">Programs</a></li>
                            <li><a href="#">Programs</a></li>
                            <li><a href="#">Programs</a></li>
                        </ul>
                    </div>

                    <div class="col-12 col-lg-3">
                        <h2 class="footer-title">Navigation</h2>
                        <form action="" class="form">
                            <div class="row">
                                <div class="col-9"><input type="email" class="form-control" placeholder="Enter your mail"></div>
                                <div class="col-3 ps-0">
                                    <a href="#" class="btn btn-primary">
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                        <ul class="list-social list-unstyled">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    document.querySelector('.mobil_dropdown_has_nav_link').addEventListener('click', function() {
        this.classList.toggle('active')
    });
    function menuOpen() {
        let x = document.getElementById("mobile-menu");
        let y = document.getElementById("mm-closebtn");
        let z = document.getElementById("mm-openbtn");
        if (x.style.display === "none") {
            document.body.style.overflow = "hidden";
            x.style.display = "block";
            y.style.display = "block";
            z.style.display = "none";
        } else {
            document.body.style.overflow = "inherit";
            x.style.display = "none";
            y.style.display = "none";
            z.style.display = "block";
        }
    }
</script>
@stack('footer')
<script src="{{ asset('assets/js/site.js') }}"></script>
<script src="{{ asset('assets/js/default.js') }}"></script>

</body>
</html>
