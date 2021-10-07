@extends('layouts.admin')

@section('title', 'Admin | ' . __('Панель адміністратора'))
@section('description', __('Панель адміністратора'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Панель адміністратора') }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            @include('admin.dashboard.environment')
        </div>
        <div class="col-4">
            @if(\App::isDownForMaintenance())
            @else

            @endif
        </div>
        <div class="col-4">
            @include('admin.dashboard.dependencies')
        </div>
    </div>
</div>
@endsection
