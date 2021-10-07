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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Користувачі') }}</li>
                </ol>
            </nav>
        </div>
    </div>

    @livewire('admin.users')
</div>
@endsection
