@extends('layouts.admin')

@section('title', 'Admin | ' . __('Редагувати продукт (' . $products->name . ')'))
@section('description', __('Редагувати продукт (' . $products->name . ')'))

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-12">
	        <nav aria-label="breadcrumb">
	            <ol class="breadcrumb">
	                <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('admin.index') }}">Панель адміністратора</a></li>
	                <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('admin.product.index') }}">{{ __('Продукти') }}</a></li>
	                <li class="breadcrumb-item active" aria-current="page">{{ $products->name }}</li>
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
				    <button class="flex-sm-fill text-sm-center nav-link" id="pills-link-tab" data-bs-toggle="pill" data-bs-target="#pills-link" type="button" role="tab" aria-controls="pills-link" aria-selected="false">{{ __('Посилання') }}</button>
				    <button class="flex-sm-fill text-sm-center nav-link" id="pills-image-tab" data-bs-toggle="pill" data-bs-target="#pills-image" type="button" role="tab" aria-controls="pills-image" aria-selected="false">{{ __('Зображення') }}</button>
				    <button class="flex-sm-fill text-sm-center nav-link" id="pills-rcp-tab" data-bs-toggle="pill" data-bs-target="#pills-rcp" type="button" role="tab" aria-controls="pills-rcp" aria-selected="false">{{ __('Рецепти') }}</button>
				    <button class="flex-sm-fill text-sm-center nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false">Disabled</button>
				</nav>
				<div class="tab-content mt-3" id="pills-tabContent">
				    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				    	<div class="form-group row py-3 required">
                            <label for="input-name" class="col-2 col-form-label text-md-end form-label-asterisk">Product Name</label>
                            <div class="col-10">
                                <input placeholder="Product Name" class="form-control" name="input-name" type="text" value="{{ $products->name }}" id="input-name">
                            </div>
                        </div>
				    	<div class="form-group row py-3 required">
                            <label for="input-description" class="col-2 col-form-label text-md-end form-label-asterisk">Description</label>
                            <div class="col-10">
                            	<input id="input-description" type="hidden" name="input-description" value="{{ $products->description }}">
                                <trix-editor class="trix-content" input="input-description"></trix-editor>
                            </div>
                        </div>
				    </div>
				    <div class="tab-pane fade" id="pills-link" role="tabpanel" aria-labelledby="pills-link-tab">
				    	Cat
				    </div>
				    <div class="tab-pane fade" id="pills-image" role="tabpanel" aria-labelledby="pills-image-tab">
				    	<x-input.filepond wire:model="newImage" />
				    </div>
				    <div class="tab-pane fade" id="pills-rcp" role="tabpanel" aria-labelledby="pills-rcp-tab">
				    	<div class="card">
				    		<div class="card-body p-0">
				    			<div wire:loading.delay class="preloader">
				    			    <div class="d-flex justify-content-center align-items-center h-100"><div class="spinner-grow" role="status"></div></div>
				    			</div>
		    			    	<x-table>
		    			    		<x-slot name="head">
		    			    		    <x-table.header class="w-15">{{ __('ID') }}</x-table.header>
		    			    		    <x-table.header class="w-15">{{ __('Версія') }}</x-table.header>
		    			    		    <x-table.header class="w-70">{{ __('') }}</x-table.header>
		    			    		</x-slot>
		    			    		<x-slot name="body">
		    				    	@forelse ($products->rcp as $rcp)
		    				    		<x-table.row>
		    				    			<x-table.cell>{{ $rcp->rcp_id }}</x-table.cell>
		    				    			<x-table.cell><a href="{{ route('admin.product.rcp.edit', [$products->product_id, $rcp->rcp_id]) }}" aria-label="{{ __('Edit') }}">{{ $rcp->rcp_version }}</a></x-table.cell>
		    				    			<x-table.cell></x-table.cell>
		    					    	</x-table.row>
		    				    	@empty
		    				    	@endforelse
		    				    	</x-slot>
		    			    	</x-table>
				    		</div>
				    		<div class="card-footer">

				    		</div>
				    	</div>
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