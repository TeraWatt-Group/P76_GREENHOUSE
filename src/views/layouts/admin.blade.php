<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#f8fafc">

    <title>@yield('title')</title>
    <meta name="keywords" content="best business software, business software, software system">
    <meta name="description" content="@yield('description')">

    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:image" content="{{ asset('img/mls_v4_1024x1024.jpg') }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">

    <meta itemprop="image" content="{{ asset('img/mls_v4_1024x1024.jpg') }}" />

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
    @include('layouts.admin_offcanvas')

    <div id="app">
        <x-banner />

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @include('layouts.footer')

    <!-- Scripts -->
    @livewireScripts
    <script src="{{ mix('js/green.js') }}"></script>
    @stack('scripts')
    @yield('script')
</body>
</html>
