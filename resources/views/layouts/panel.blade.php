<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" href="{!! asset(settings()->site_favicon) !!}">

    <title>{{ $title }} - {{ config('app.name', 'Tenzone') }}</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" type="text/css">
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
                @hasrole('superadmin|admin')
                <li>
                    <a href="programme.html" class="active">
                        <div class="icon"><i class="ri-file-list-2-line"></i></div> ADMİN
                    </a>
                </li>
                @else
                    <li>
                        <a href="programme.html" class="active">
                            <div class="icon"><i class="ri-file-list-2-line"></i></div> Programme
                        </a>
                    </li>
                    <li>
                        <a href="reports.html">
                            <div class="icon"><i class="ri-funds-box-line"></i></div> Reports
                        </a>
                    </li>
                    <li>
                        <a href="connect.html">
                            <div class="icon"><i class="ri-chat-smile-2-line"></i></div> Connect
                        </a>
                    </li>
                    @endrole
            </ul>
        </div>
        <div class="alt">
            <a href="javascript:;" class="btn btn-light btn-block btn-48">Tenzone Portal v1.0</a>
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

            <a class="btn btn-icon" href="{{ route('messages.seen') }}" role="button">
                <i class="ri-mail-open-line"></i>
            </a>

            @hasanyrole('user')
            <a href="#" class="btn btn-opacity-success fs-14 fw-medium ms-4 me-3 credit">
                {{ user()->plan_credit }} Credit
            </a>
            @endhasanyrole

            <div class="dropdown tm-topbar-profile">
                <a class="btn flex-start items-center" href="#" role="button" id="dropdownNotification" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="img"><img src="{{asset('images/profile.png')}}" alt="profile"></div>
                    <div class="right">
                        <span class="name">{{ auth()->user()->fullname }}</span>
                        <span class="desc">{{ __('role.' . auth()->user()->getRoleNames()[0]) }}</span>
                    </div>
                    <i class="ri-arrow-drop-down-line arrow"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownNotification">
                    <li><a class="dropdown-item" href="{{ route('my.profile') }}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('messages.seen') }}">Messages</a></li>
                    <li><a class="dropdown-item" href="{{ route('my.logout') }}">Log out</a></li>
                </ul>
            </div>
        </div>

    </div>
    <div class="container-fluid pt-4">
        {{$slot}}
    </div>
</main>

@stack('modals')
</body>
</html>
