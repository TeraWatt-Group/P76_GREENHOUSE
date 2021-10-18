@extends('layouts.admin')

@section('title', 'Admin | ' . __('admin.cars'))
@section('description', __('admin.cars'))

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-12">
	        <nav aria-label="breadcrumb">
	            <ol class="breadcrumb">
	                <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('admin.index') }}">Панель адміністратора</a></li>
	                <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('admin.product.index') }}">{{ __('Продукти') }}</a></li>
	                <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('admin.product.edit', $products->product_id) }}">{{ $products->name }}</a></li>
	                <li class="breadcrumb-item active" aria-current="page">{{ __('Рецепт ') . $rcp->rcp_version }}</li>
	            </ol>
	        </nav>
	    </div>
	</div>
	<div class="row mb-2">
	    <div class="col-12">
	        <div class="d-flex justify-content-start">
	            <h3 class="mb-0 pr-3">{{ __('Редагувати рецепт (' . $products->name . ')') }}</h3>
	        </div>
	    </div>
	</div>
</div>
@endsection
