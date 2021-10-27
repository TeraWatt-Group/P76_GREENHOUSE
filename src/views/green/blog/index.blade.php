@extends('layouts.app')

@section('title', __('green.welcome_blog'))
@section('description', __('green.welcome_blog'))

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-12">
	        <nav aria-label="breadcrumb">
	            <ol class="breadcrumb">
	            	<li class="breadcrumb-item"><a class="link-secondary" href="{{ route('welcome') }}">{{ __('Головга') }}</a></li>
	                <li class="breadcrumb-item active" aria-current="page">{{ __('green.welcome_blog') }}</li>
	            </ol>
	        </nav>
	    </div>
	</div>
	<div class="row mb-3">
	    <div class="col-12">
	        <div class="d-flex align-content-start align-items-end">
	            <h3 class="mb-0 pr-3">{{ __('green.welcome_blog') }}</h3>
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
</div>
@endsection

@section('script')
@endsection