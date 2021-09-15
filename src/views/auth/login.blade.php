<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="fontawesome-i2svg-pending">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <link rel="apple-touch-icon" sizes="57x57" href="/img/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/img/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/img/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/img/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title>{{ config('green.app_name') }}</title>
    <meta name="keywords" content="best business software, business software, software system">
    <meta name="description" content="{{ config('green.app_description') }}">

    <meta property="og:title" content="{{ config('green.app_name') }}">
    <meta property="og:description" content="{{ config('green.app_description') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:image" content="{{ asset('/img/mls_v4_1024x1024.jpg') }}" />
    <meta property="og:site_name" content="{{ config('green.app_name') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ mix('css/green.css') }}" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 5px;
            margin: auto;
        }
        .form-signin .form-floating:focus-within {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>

    <link rel="manifest" href='/manifest.json' crossorigin="use-credentials">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
</head>
<body class="text-center">
    <main class="form-signin">
        <img class="mb-1" src="{{ asset('img/logo_v2.svg') }}" alt="" width="92" height="77">
        <h2>{{ __('auth.login') }}</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-floating">
                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocorrect="off" autofocus="autofocus" placeholder="name@example.com">
                <label for="email">{{ __('auth.email') }}</label>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-floating">
                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="floatingPassword" name="password" required autocorrect="off" placeholder="Password">
                <label for="floatingPassword">{{ __('auth.password') }}</label>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            @if (Route::has('password.request'))
                <div class="float-right">
                    <a class="label-link" href="{{ route('password.request') }}">
                        {{ __('auth.forget') }}
                    </a>
                </div>
            @endif

            <input class="d-none" type="checkbox" name="remember" id="remember" checked>

            <div class="d-grid mt-2">
                <input type="submit" name="commit" value="{{ __('auth.sign_in') }}" class="btn btn-primary"></input>
            </div>
            <p class="mt-3 mb-3 text-muted">© {{ date('Y') }}</p>
        </form>
    </main>
</body>
</html>
