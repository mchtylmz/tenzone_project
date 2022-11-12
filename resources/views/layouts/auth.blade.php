<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" href="{!! asset(settings()->site_favicon) !!}">

    <title>{{ $title }} - {{ config('app.name', 'Laravel') }}</title>
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" type="text/css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/panel.css') }}">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/remixicon/remixicon.css') }}" rel="stylesheet">

    @stack('styles')

    <!-- Scripts -->
    <script>
        const lang = {
            unknown_error: '{{ __('message.unknown_error') }}',
        }
    </script>
    <script src="{{ asset('assets/js/auth.js') }}" defer></script>
</head>
<body class="{{ $class ?? 'bg-white' }}">
    <main class="{{ $mainClass ?? '' }} page-100-center">
        {{ $slot }}
    </main>

    @stack('modals')
    @stack('scripts')
</body>
</html>
