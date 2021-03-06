@extends('layouts.app')

@section('title', $product->descriptions->name)
@section('description', $product->descriptions->name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('home') }}">Головна</a></li>
                    <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('green.product.index') }}">Продукти</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->descriptions->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="d-flex align-content-start align-items-end">
                <h1 class="mb-0 pr-3">{{ $product->descriptions->name }}</h1>
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





    <div class="row mb-3">
        <div class="col-6 mb-3">
            <div class="col-12 mb-3">
                <h2>{{ __('Характеристики') }}</h2>
            </div>
            <div class="col-12">

            </div>
        </div>
        <div class="col-6 mb-3">
            <div class="col-12 mb-4">
                <div class="thumbnail">
                    <img id="currentImage" src="{{ $product->image }}" class="rounded-lg mx-auto img-fluid d-block active" alt="{{ $product->descriptions->name }}" height="550" width="650">
                </div>
            </div>
            <div class="row">
                <div class="col-4 mb-4">
                    <div class="thumbnails selected">
                        <img src="{{ $product->image }}" class="rounded-lg mx-auto img-fluid d-block" alt="{{ $product->descriptions->name }}" height="110" width="130">
                    </div>
                </div>
                @foreach ($product->images as $key => $images)
                    <div class="col-4 mb-4">
                        <div class="thumbnails">
                            <img src="{{ $images->image }}" class="rounded-lg mx-auto img-fluid d-block" alt="{{ $product->descriptions->name }}" height="110" width="130">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12 mb-3">
            <h2>{{ __('Опис') }}</h2>
        </div>
        <div class="col-12">
            <div class="card text-dark bg-light">
                <div class="card-body">
                    {{ $product->descriptions->description }}
                </div>
            </div>
        </div>
    </div>



</div>
@endsection

@section('script')
<script>
    (function(){
        const currentImage = document.querySelector('#currentImage');
        const images = document.querySelectorAll('.thumbnails');
        images.forEach((element) => element.addEventListener('click', thumbnailClick));

        console.log(currentImage);
        function thumbnailClick(e) {
            currentImage.classList.remove('active');
            currentImage.addEventListener('transitionend', () => {
                currentImage.src = this.querySelector('img').src;
                currentImage.classList.add('active');
            })
            images.forEach((element) => element.classList.remove('selected'));
            this.classList.add('selected');
        }
    })();
</script>
@endsection