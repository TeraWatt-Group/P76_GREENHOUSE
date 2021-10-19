@extends('layouts.admin')

@section('title', 'Admin | ' . __('Категорії'))
@section('description', __('Категорії'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('admin.index') }}">Панель адміністратора</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Категорії') }}</li>
                </ol>
            </nav>
        </div>
    </div>

    @livewire('admin.categorys')
</div>
@endsection
