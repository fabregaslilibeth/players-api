<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Font Awesome -->
    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">--}}
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="text-gray-600 font-sans">
<div id="app" class="">
    <div class="relative">
        @if (session('flash') && session('flash_type'))
            <alert message="{{ session('flash') }}" type="{{ session('flash_type') }}"></alert>
        @elseif (session('status'))
            <alert message="{{ session('status') }}" type="success"></alert>
        @endif

        @guest
            <div class="">
                <main class="">
                    @include('layouts.navbar')

                    @yield('content')
                </main>
            </div>
        @else
            @include('layouts.sidebar', ['current' => request()->path()])
            <div class="lg:ml-60">
                <main class="">
                    @include('layouts.navbar')

                    @yield('content')
                </main>
            </div>
        @endif
    </div>
</div>

@yield('js-after')
</body>
</html>
