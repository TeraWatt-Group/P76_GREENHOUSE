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

	<h1 style="text-align:center">
		Your Result
		<span style="font-weight:normal">10</span>
	</h1>
</div>
@endsection

@section('script')
@endsection