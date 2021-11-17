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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Редагувати користувача (' . $users->name . ')') }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <h3 class="mb-0 pr-3">{{ __('Редагувати користувача (' . $users->name . ')') }}</h3>
            </div>
        </div>
    </div>
    {!! Form::model($users, ['role' => 'form', 'url' => route('admin.users.update', $users->id), 'method' => 'PUT']) !!}
        {{ Form::hidden('id', $users->id) }}
        <div class="row">
            <div class="col-12 mb-3">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.users.index') }}" aria-pressed="true" class="btn btn-secondary" role="button" aria-label="{{ __('main.back') }}">
                        {{ __('Back') }}
                    </a>
                    {!! Form::button(__('Save'), ['type' => 'submit', 'class' => 'btn btn-success ms-2', 'aria-label' => __('main.save')]) !!}
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
                                {!! Form::text('name', $users->name, ['placeholder' => 'Name', 'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-3"></div>
                        </div>
                        <hr>
                        <div class="form-group row px-3">
                            {!! Form::label('email', 'E-mail', ['class' => 'col-3 col-form-label text-md-end form-label-asterisk']) !!}

                            <div class="col-6">
                                {!! Form::text('email', $users->email, ['placeholder' => 'E-mail', 'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')]) !!}
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-3"></div>
                        </div>
                        <hr>
                        <div class="form-group row px-3">
                            {!! Form::label('status', 'Группа', ['class' => 'col-3 col-form-label text-md-end form-label-asterisk']) !!}

                            <div class="col-6">
                                <select class="form-select" name="status">
                                    @foreach ($roles as $key => $role)
                                        @if ($users->status == $role)
                                            <option value="{{ $role }}" selected>{{ $key }}</option>
                                        @else
                                            <option value="{{ $role }}">{{ $key }}</option>
                                        @endif
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
