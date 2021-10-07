@extends('layouts.admin')

@section('title', 'Admin | ' . __('Дозволи'))
@section('description', __('Додати новий дозвіл'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('admin.index') }}">Панель адміністратора</a></li>
                    <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('admin.permissions.index') }}">{{ __('Дозволи') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Додати новий дозвіл') }}</li>
                </ol>
            </nav>
        </div>
    </div>
    {{ Form::open(['url' => route('admin.permissions.store'), 'method' => 'POST']) }}
        @csrf
        <div class="row mb-2">
            <div class="col-12">
                <div class="d-flex align-content-start align-items-end">
                    <h3 class="mb-0 pr-3">{{ __('Додати новий дозвіл') }}</h3>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    <a role="button" aria-pressed="true" class="btn btn-secondary me-2" role="button" href="{{ route('admin.permissions.index') }}">
                        {{ __('Back') }}
                    </a>
                    {!! Form::button(__('Save'), ['type' => 'submit', 'class' => 'btn btn-success', 'aria-label' => 'save']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body px-0">
                        <div class="form-group row px-3">
                            {!! Form::label('name', __('Назва'), ['class' => 'col-3 col-form-label text-md-end'], false) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', old('name'), ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row px-3">
                            {!! Form::label('guard_name', __('Guard'), ['class' => 'col-3 col-form-label text-md-end form-label-asterisk'], false) !!}
                            <div class="col-md-6">
                                <select class="form-select" name="guard_name" aria-label="Select guard">
                                    @foreach ($guards as $key => $guard)
                                        <option value="{{ $key }}">{{ $key }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('guard_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('guard_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{ Form::close() }}
</div>
@endsection
