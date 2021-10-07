@extends('layouts.admin')

@section('title', 'Admin | ' . __('Roles'))
@section('description', __('Roles'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('admin.index') }}">Панель адміністратора</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Roles') }}</li>
                </ol>
            </nav>
        </div>
    </div>

    @livewire('admin.roles')
</div>
@endsection
