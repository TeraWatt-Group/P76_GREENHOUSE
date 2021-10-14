<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head class="h-100">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons and Apple Touch Icons -->
    <meta name="theme-color" content="#ffffff">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" sizes="57x57" href="/img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/img/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/favicons/apple-touch-icon-152x152.png">
    <link rel="icon" type="image/png" sizes="196x196" href="/img/favicons/favicon-196x196.png">
    <link rel="icon" type="image/png" sizes="160x160" href="/img/favicons/favicon-160x160.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicons/favicon-16x16.png">
    <link rel="icon" type="image/x-icon" href="/img/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/img/favicons/mstile-144x144.png">

    <title>@yield('title')</title>
    <meta name="keywords" content="best business software, business software, software system">
    <meta name="description" content="{{ config('green.app_description') }}">

    <meta property="og:title" content="{{ config('green.app_name') }}">
    <meta property="og:description" content="{{ config('green.app_description') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:image" content="/img/favicons/logo.png" />
    <meta property="og:site_name" content="{{ config('green.app_name') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ mix('css/green.css') }}" rel="stylesheet">
    @livewireStyles
    @stack('styles')

    <link rel="manifest" href='/manifest.json' crossorigin="use-credentials">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
</head>
<body class="d-flex flex-column h-100">
    @include('layouts.header')
    @include('layouts.offcanvas')

    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    @livewireScripts
    <script src="{{ mix('js/green.js') }}" defer></script>
    @stack('scripts')
    @yield('script')
</body>
</html>
