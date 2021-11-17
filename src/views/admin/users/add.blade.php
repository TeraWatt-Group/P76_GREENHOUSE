@extends('layouts.admin')

@section('title', 'Admin | ' . __('Користувачі'))
@section('description', __('Користувачі'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('admin.index') }}">Панель адміністратора</a></li>
                    <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('admin.users.index') }}">{{ __('Користувачі') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Додати користувача') }}</li>
                </ol>
            </nav>
        </div>
    </div>
    {!! Form::open(['role' => 'form', 'url' => route('admin.users.store')]) !!}
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="d-flex align-content-start align-items-end">
                    <h3 class="mb-0 pr-3">{{ __('Додати користувача') }}</h3>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="d-flex justify-content-end">
                    <a role="button" aria-pressed="true" class="btn btn-secondary" role="button" href="{{ route('admin.users.index') }}">
                        {{ __('Back') }}
                    </a>
                    {!! Form::button(__('Save'), ['type' => 'submit', 'class' => 'btn btn-success ms-2', 'aria-label' => 'save']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body px-0">
                        <div class="form-group row px-3">
                            {!! Form::label('name', 'Name', ['class' => 'col-3 col-form-label text-md-end form-label-asterisk']) !!}

                            <div class="col-6">
                                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row px-3">
                            {!! Form::label('password', 'Password', ['class' => 'col-3 col-form-label text-md-end form-label-asterisk']) !!}

                            <div class="col-6">
                                {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '')]) !!}
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row px-3">
                            {!! Form::label('email', 'E-mail', ['class' => 'col-3 col-form-label text-md-end form-label-asterisk']) !!}

                            <div class="col-6">
                                {!! Form::text('email', null, ['placeholder' => 'E-mail', 'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')]) !!}
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row px-3">
                            {!! Form::label('status', 'Группа', ['class' => 'col-3 col-form-label text-md-end form-label-asterisk']) !!}

                            <div class="col-6">
                                <select class="form-select" name="status">
                                    @foreach ($roles as $key => $role)
                                            <option value="{{ $role }}">{{ $key }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>
@endsection
