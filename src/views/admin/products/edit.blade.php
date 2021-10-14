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
	                <li class="breadcrumb-item active" aria-current="page">{{ __('Продукти') }}</li>
	            </ol>
	        </nav>
	    </div>
	</div>
	<div class="row mb-2">
	    <div class="col-12">
	        <div class="d-flex justify-content-start">
	            <h3 class="mb-0 pr-3">{{ __('Редагувати продукт (' . $products->name . ')') }}</h3>
	        </div>
	    </div>
	</div>
	<form method="PUT" action="{{ route('admin.product.update', $products->product_id) }}" accept-charset="UTF-8" role="form">
		@csrf
		<input name="id" type="hidden" value="{{ $products->product_id }}">
		<div class="row">
            <div class="col-12 mb-3">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.product.index') }}" aria-pressed="true" class="btn btn-secondary" role="button" aria-label="{{ __('green.back') }}">
                        {{ __('green.back') }}
                    </a>
                    <button type="submit" class="btn btn-success ms-2" aria-label="{{ __('green.save') }}">{{ __('green.save') }}</button>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="col-12">
				<nav class="nav nav-pills flex-column flex-sm-row">
				    <button class="flex-sm-fill text-sm-center nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{ __('Основні') }}</button>
				    <button class="flex-sm-fill text-sm-center nav-link" id="pills-image-tab" data-bs-toggle="pill" data-bs-target="#pills-image" type="button" role="tab" aria-controls="pills-image" aria-selected="false">{{ __('Зображення') }}</button>
				    <button class="flex-sm-fill text-sm-center nav-link" id="pills-rcp-tab" data-bs-toggle="pill" data-bs-target="#pills-rcp" type="button" role="tab" aria-controls="pills-rcp" aria-selected="false">{{ __('Рецепти') }}</button>
				    <button class="flex-sm-fill text-sm-center nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false">Disabled</button>
				</nav>
				<div class="tab-content mt-3" id="pills-tabContent">
				    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				    	<div class="form-group pt-3 required">
				    		<div class="mb-3 row">
				    		    <label for="input-name" class="col-sm-2 col-form-label">Product Name</label>
				    		    <div class="col-sm-10">
				    		        <input type="text" class="form-control" id="input-name" name="input-name" placeholder="Product Name" value="{{ $products->name }}">
				    		    </div>
				    		</div>
				    	</div>
				    	<div class="form-group pt-3 required">
				    		<div class="mb-3 row">
				    		    <label for="input-description" class="col-sm-2 col-form-label">Description</label>
				    		    <div class="col-sm-10">
				    		    	<input id="input-description" type="hidden" name="input-description" value="{{ $products->description }}">
				    		        <trix-editor class="trix-content" input="input-description"></trix-editor>
				    		    </div>
				    		</div>
				    	</div>
				    </div>
				    <div class="tab-pane fade" id="pills-image" role="tabpanel" aria-labelledby="pills-image-tab">
				    	<x-input.filepond wire:model="newImage" />
				    </div>
				    <div class="tab-pane fade" id="pills-rcp" role="tabpanel" aria-labelledby="pills-rcp-tab">
				    	@forelse ($products->rcp as $rcp)

					    		{{ $rcp->rcp_version }}

				    	@empty
				    	@endforelse
				    </div>
				    <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab">Disabled</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection

@push('styles')
	<link href="{{ mix('css/filepond.css') }}" rel="stylesheet">
@endpush
@push('scripts')
	<script src="{{ mix('js/filepond.js') }}" defer></script>
@endpush