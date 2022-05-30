@if($style == 'transparent')
    <nav class="navbar navbar-expand-lg tz-navbar navbar-transparent" style="background-color: transparent; padding: 23px 0 !important;">
@else
    <nav class="navbar navbar-expand-lg tz-navbar">
@endif
    <div class="container">
        <a href="/" class="navbar-brand"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a>
        <button class="navbar-toggler" type="button" onclick="menuOpen()">
            <i class="fa fa-bars" id="mm-openbtn"></i>
            <i class="fa fa-times" style="display: none;" id="mm-closebtn"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="tenzoneNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="nav_link_has_dropdown">
                        <a class="nav-link" href="javascript:;">{{ __('Services') }}</a>
                        <ul class="dropdown_nav_link">
                            <li><a href="{{ route('service.detail', 'educational') }}">{{ __('Educational Programs') }}</a></li>
                            <li><a href="{{ route('service.detail', 'theraphy') }}">{{ __('Theraphy Services') }}</a></li>
                            <li><a href="{{ route('service.detail', 'ten') }}">{{ __('Ten Shop') }}</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('store') }}">{{ __('Store') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">{{ __('About') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('help') }}">{{ __('Help') }}</a>
                </li>
            </ul>
        </div>

        <div class="collapse navbar-collapse justify-content-end" id="tenzoneNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-light btn-cart" href="{{ route('cart') }}">
                        <img src="{{ asset('images/icons/shop.svg') }}" alt="icon">
                    </a>
                </li>
                @auth()
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary" href="{{ route('my.account') }}">{{ __('My Account') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-light btn-cart" href="{{ route('my.logout')}}">
                            <img src="{{ asset('images/logout.svg') }}" alt="icon">
                        </a>
                    </li>

                @else
                    <li class="nav-item"><a class="nav-link btn btn-outline-primary" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary" href="{{ route('plans') }}">{{ __('Sign Up') }}</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<div class="tz-mobile-menu" id="mobile-menu" style="display:none;">
    <ul class="list-unstyled mb-4">
        <li>
            <div class="mobil_dropdown_has_nav_link">
                <a href="#">{{ __('Services') }}</a>
                <ul class="mobile_dropdown_nav_link">
                    <li><a href="{{ route('service.detail', 'educational') }}">{{ __('Educational Programs') }}</a></li>
                    <li><a href="{{ route('service.detail', 'theraphy') }}">{{ __('Theraphy Services') }}</a></li>
                    <li><a href="{{ route('service.detail', 'ten') }}">{{ __('Ten Shop') }}</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="{{ route('store') }}">{{ __('Store') }}</a>
        </li>
        <li>
            <a href="{{ route('about') }}">{{ __('About') }}</a>
        </li>
        <li>
            <a href="{{ route('help') }}">{{ __('Help') }}</a>
        </li>
    </ul>
    <div class="flex-between">
        <a href="{{ route('cart') }}" class="btn btn-light btn-cart">
            <img src="{{ asset('images/icons/shop-dark.svg') }}">
        </a>

        @auth()
            <a href="{{ route('my.account') }}" class="btn btn-light ms-3">{{ __('My Account') }}</a>
            <a href="{{ route('my.logout') }}" class="btn btn-outline-light btn-cart">
                <i class="fa fa-sign-out-alt"></i>
            </a>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-light ms-3">{{ __('Login') }}</a>
            <a href="{{ route('plans') }}" class="btn btn-light ms-3">{{ __('Sign Up') }}</a>
        @endauth
    </div>
</div>
