@extends('layouts.app')

@section('title', __('Продукти'))
@section('description', __('Продукти'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('home') }}">Головна</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Продукти') }}</li>
                </ol>
            </nav>
        </div>
    </div>

    @if ($product->isNotEmpty())
        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-5 pb-5">
            @foreach ($product as $prod)
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-dark bg-light border-none" style="background-image: url({{ $prod->image }});">
                        <div class="card-body">
                            <div class="d-flex flex-column h-100 p-4 pb-3 text-dark text-shadow-1">
<!--                                 <h2 class="pt-3 mt-1 mb-4 display-6 lh-1 fw-bold">{{ $prod->name }}</h2>
                                <p>{{ $prod->description }}</p> -->
                            </div>
                            <a href="{{ route('green.product.show', $prod->product_id) }}" class="stretched-link" aria-label="index"></a>
                        </div>
                    </div>
                    <h2 class="pt-1 mt-1 mb-4 fs-3 lh-1 fw-bold text-center">{{ $prod->name }}</h2>
                </div>
            @endforeach
        </div>
    @else
    @endif
</div>
@endsection
