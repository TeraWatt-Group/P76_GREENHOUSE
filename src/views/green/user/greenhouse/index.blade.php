@extends('layouts.app')

@section('title', __('Мої теплиці'))
@section('description', __('Мої теплиці'))

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-12">
	        <nav aria-label="breadcrumb">
	            <ol class="breadcrumb">
	            	<li class="breadcrumb-item"><a class="link-secondary" href="{{ route('welcome') }}">{{ __('Головга') }}</a></li>
	                <li class="breadcrumb-item active" aria-current="page">{{ __('Мої теплиці') }}</li>
	            </ol>
	        </nav>
	    </div>
	</div>
	<div class="row mb-3">
	    <div class="col-12">
	        <div class="d-flex align-content-start align-items-end">
	            <h3 class="mb-0 pr-3">{{ __('Мої теплиці') }}</h3>
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
	<div class="row">
		@forelse ($equipments as $equipment)
			<div class="col-lg-4">
                <div class="card border-success text-success text-center mb-3">
                    <div class="card-body px-2 pt-2 pb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <small class="py-1 px-2 rounded bg-success text-white mb-1">Не вибрано</small>
                            <small class="py-1 px-2 rounded bg-success text-white mb-1">0</small>
                        </div>
                        <h5 class="card-title">{{ $equipment->name }}</h5>
                        <p class="card-text">
                        	{{ $equipment->name }}
                        </p>
                    </div>
                    <a href="{{ route('user.greenhouse.show', $equipment->equipmentid) }}" class="stretched-link"></a>
                </div>
            </div>
		@empty

		@endforelse
		@if (true)
            <div class="col-lg-4">
                <div class="card bg-light text-center mb-3">
                    <div class="card-body px-2 pt-2 pb-3" style="min-height: 106px;">
                        <div class="d-flex justify-content-between mb-1">
                            <small class="py-1 px-2 rounded bg-white text-dark mb-1">Додати</small>
                        </div>
                        <div style="position: absolute;left: 44%;top: 28%;">
                            <svg style="height: 50px;" class="text-muted" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M368 224H224V80c0-8.84-7.16-16-16-16h-32c-8.84 0-16 7.16-16 16v144H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h144v144c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16V288h144c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16z"></path></svg>
                        </div>
                    </div>
                    <a href="{{ route('green.create') }}" class="stretched-link"></a>
                </div>
            </div>
        @endif
	</div>
</div>
@endsection

@section('script')
@endsection