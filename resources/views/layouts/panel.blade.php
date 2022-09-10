<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" href="{!! asset(settings()->site_favicon) !!}">

    <title>{{ $title }} - {{ config('app.name', 'TEN Academy') }}</title>
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" type="text/css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" type="text/css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/panel.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/remixicon/remixicon.css') }}" rel="stylesheet">

    @stack('styles')

    <!-- Scripts -->
    <script>
        const lang = {
            unknown_error: '{{ __('message.unknown_error') }}',
        }
    </script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @stack('scripts')
</head>
<body>

@auth()
    <nav class="tm-sidebar" id="tmSidenav">
        <div class="logo">
            <img src="{{ asset('images/logo.svg') }}" alt="logo">
            <a href="javascript:void(0)" class="tm-sidebar-close"><i class="ri-close-line fs-24 text-dark"></i></a>
        </div>
        <div class="links">
            <ul class="list-unstyled">
                @include('panel.menu')
            </ul>
        </div>
        <div class="alt">
            <a href="javascript:;" class="btn btn-light btn-block btn-48">The TEN Academy Portal v1.0</a>
        </div>
    </nav>
@endauth

<main class="main">
    <div class="tm-topbar flex-between items-center">
        <div class="left flex-start items-center">
            <a href="javascript:void(0)" class="tm-sidebar-open"><i class="ri-menu-line fs-24 text-dark"></i></a>
        </div>

        <div class="flex-end items-center">
            <div class="dropdown after-line">
                <a class="btn btn-icon" href="#" role="button" id="dropdownNotification" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ri-notification-line"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-notification" aria-labelledby="dropdownNotification">

                    <li>
                        <div class="box flex-start">
                            <div class="icon bg-opacity-main"><i class="ri-information-line text-main"></i></div>
                            <div class="content">
                                <span class="title">Hello! This is an information notification.</span>
                                <span class="desc">This is the description field for more information</span>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>

            <a class="btn btn-icon d-flex align-items-center gap-2" href="{{ route('messages.seen') }}" role="button">
                <i class="ri-mail-open-line"></i>
                @if($count = user()->message_count())
                    <h5 class="mb-0 text-danger">{{ $count }}</h5>
                @endif
            </a>

            @hasanyrole('user|parent')
            <a href="{{ route('buy.credit') }}" class="btn btn-opacity-success fs-14 fw-medium ms-4 me-3 credit">
                {{ credit() }} Credit
            </a>
            @endhasanyrole

            <div class="dropdown tm-topbar-profile">
                <a class="btn flex-start items-center" href="#" role="button" id="dropdownNotification" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="img"><img src="{!! asset(user()->image) !!}" alt="profile"></div>
                    <div class="right">
                        <span class="name">{{ auth()->user()->fullname }}</span>
                        <span class="desc">{{ __('role.' . auth()->user()->getRoleNames()[0]) }}</span>
                    </div>
                    <i class="ri-arrow-drop-down-line arrow"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownNotification">
                    <li><a class="dropdown-item" href="{{ route('my.profile') }}">{{ __('Profile') }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('messages.seen') }}">{{ __('Messages') }}</a></li>
                    @role('parent')
                    <li><a class="dropdown-item" href="{{ route('parent.subscription') }}">{{ __('Subscription') }}</a></li>
                    @endrole
                    <li><a class="dropdown-item" href="{{ route('my.logout') }}">{{ __('Log out') }}</a></li>
                </ul>
            </div>
        </div>

    </div>
    <div class="container-fluid pt-4 pb-4">

        @if (session('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @endif

        {{$slot}}
    </div>
</main>

@stack('modals')
</body>
</html>
