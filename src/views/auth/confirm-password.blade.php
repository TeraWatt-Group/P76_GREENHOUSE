@extends('layouts.app')

@section('content')
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
<div class="text-center">
    <main class="form-signin">
        <img class="mb-1" src="{{ asset('img/logo_v2.svg') }}" alt="" width="92" height="77">
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

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

            <div class="d-grid mt-2">
                <input type="submit" name="commit" value="{{ __('auth.login') }}" class="btn btn-primary"></input>
            </div>
        </form>
    </main>
</div>
@endsection
