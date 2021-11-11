@extends('layouts.app')

@section('title', __('Теплиці'))
@section('description', __('Теплиці'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('home') }}">Головна</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Теплиці') }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="d-flex align-content-start align-items-end">
                <h3 class="mb-0 pr-3">{{ __('Теплиці') }}</h3>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <div class="d-flex justify-content-start">

            </div>
        </div>
        <div class="col-6">
            <div class="d-flex justify-content-end">

            </div>
        </div>
    </div>
    @if ($equipments->isNotEmpty())
        <div class="row">
            @foreach ($equipments as $equipment)
                <div class="col-4 mb-3">
                    <div class="card border-0">
                        <div class="position-relative">
                            <img class="card-img" src="{{ $equipment->image }}" alt="Card image">
                            <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                            </div>
                        </div>
                        <div class="card-body text-center px-0 pt-3">
                            <a href="{{ route('green.equipment.show', $equipment->equipmentid) }}" class="stretched-link" aria-label="index"></a>
                            <h4 class="card-title"><a href="post-single.html" class="btn-link text-reset fw-bold">{{ $equipment->name }}</a></h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
    @endif
</div>
@endsection