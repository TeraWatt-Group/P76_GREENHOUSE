@extends('layouts.app')

@section('title', __('Головна'))
@section('description', __('Головна'))

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-12">
	        <nav aria-label="breadcrumb">
	            <ol class="breadcrumb">
	                <li class="breadcrumb-item active" aria-current="page">{{ __('Головна') }}</li>
	            </ol>
	        </nav>
	    </div>
	</div>
	<div class="row mb-3">
	    <div class="col-12">
	        <div class="d-flex align-content-start align-items-end">
	            <h3 class="mb-0 pr-3">{{ __('Головна') }}</h3>
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