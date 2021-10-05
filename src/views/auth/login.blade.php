<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="fontawesome-i2svg-pending">
<head>
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

    <title>{{ config('green.app_name') }}</title>
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
    <style>
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
</head>
<body class="h-100">
    <main class="welcome">
        <div class="d-flex flex-column py-3 px-sm-5 bg-light col-12 col-xs-12 col-sm-8 col-md-6 col-lg-4 offset-0 offset-sm-4 offset-md-6 offset-lg-8">
            <div class="form-signin">
                <div class="h-100 py-5 text-center">
                    <div class="mb-2 text-success">
                        <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="height: 80px;"><path fill="currentColor" d="M546.2 9.7c-5.6-12.5-21.6-13-28.3-1.2C486.9 62.4 431.4 96 368 96h-80C182 96 96 182 96 288c0 7 .8 13.7 1.5 20.5C161.3 262.8 253.4 224 384 224c8.8 0 16 7.2 16 16s-7.2 16-16 16C132.6 256 26 410.1 2.4 468c-6.6 16.3 1.2 34.9 17.5 41.6 16.4 6.8 35-1.1 41.8-17.3 1.5-3.6 20.9-47.9 71.9-90.6 32.4 43.9 94 85.8 174.9 77.2C465.5 467.5 576 326.7 576 154.3c0-50.2-10.8-102.2-29.8-144.6z" class=""></path></svg>
                    </div>
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
                </div>
            </div>
        </div>
    </main>
</body>
</html>
