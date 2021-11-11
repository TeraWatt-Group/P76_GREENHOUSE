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
	                <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('admin.product.edit', $products->productid) }}">{{ $products->name }}</a></li>
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
	{!! Form::model($rcp, ['role' => 'form', 'url' => route('admin.product.rcp.update', [$products->productid, $rcp->rcpid]), 'method' => 'PUT']) !!}
	    {{ Form::hidden('rcpid', $rcp->rcpid) }}
	    <div class="row">
	        <div class="col-12 mb-3">
	            <div class="d-flex justify-content-end">
	                <a href="{{ route('admin.product.edit', $products->productid) }}" aria-pressed="true" class="btn btn-secondary" role="button" aria-label="{{ __('green.back') }}">
	                    {{ __('green.back') }}
	                </a>
	                {!! Form::button(__('green.save'), ['type' => 'submit', 'class' => 'btn btn-success ms-2', 'aria-label' => __('green.save')]) !!}
	            </div>
	        </div>
	    </div>
    	<div class="form-group row py-3 required">
            {!! Form::label('rcp_version', __('Version'), ['class' => 'col-2 col-form-label text-md-end form-label-asterisk']) !!}
            <div class="col-10">
            	{!! Form::text('rcp_version', $rcp->rcp_version, ['placeholder' => __('Version'), 'class' => 'form-control' . ($errors->has('rcp_version') ? ' is-invalid' : ''), 'disabled' => 'disabled']) !!}
            	@if ($errors->has('rcp_version'))
            	    <span class="invalid-feedback" role="alert">
            	        <strong>{{ $errors->first('rcp_version') }}</strong>
            	    </span>
            	@endif
            </div>
        </div>
    	<div class="form-group row py-3">
            {!! Form::label('rcp_description', __('Опис'), ['class' => 'col-2 col-form-label text-md-end']) !!}
            <div class="col-10">
            	{!! Form::text('rcp_description', $rcp->rcp_description, ['placeholder' => __('Опис'), 'class' => 'form-control' . ($errors->has('rcp_description') ? ' is-invalid' : '')]) !!}
            	@if ($errors->has('rcp_description'))
            	    <span class="invalid-feedback" role="alert">
            	        <strong>{{ $errors->first('rcp_description') }}</strong>
            	    </span>
            	@endif
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <table id="table-fields" class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>{{ __('Назва') }}</th>
                                    <th>{{ __('Tag') }}</th>
                                    <th>{{ __('Тип') }}</th>
                                    <th>{{ __('Значення') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rcp->options as $key => $rcpOption)
                                    <tr id="option-row-{{ $key }}">
                                    	<td>
                                    	    {!! Form::text('column[' . $key . '][name]', old('column[' . $key . '][name]', $rcpOption->name), ['class' => 'form-control' . ($errors->has('column.' . $key . '.name') ? ' is-invalid' : ''), 'placeholder' => __('Назва')]) !!}
                                    	    @if ($errors->has('column.' . $key . '.name'))
                                    	        <span class="invalid-feedback" role="alert">
                                    	            <strong>{{ $errors->first('column.' . $key . '.name') }}</strong>
                                    	        </span>
                                    	    @endif
                                    	</td>
                                    	<td>
                                    	    {!! Form::text('column[' . $key . '][tag_name]', old('column[' . $key . '][tag_name]', $rcpOption->tag_name), ['class' => 'form-control' . ($errors->has('column.' . $key . '.tag_name') ? ' is-invalid' : ''), 'placeholder' => __('Tag'), 'disabled' => 'disabled']) !!}
                                    	    @if ($errors->has('column.' . $key . '.tag_name'))
                                    	        <span class="invalid-feedback" role="alert">
                                    	            <strong>{{ $errors->first('column.' . $key . '.tag_name') }}</strong>
                                    	        </span>
                                    	    @endif
                                    	</td>
                                        <td>
                                            {!! Form::select('column[' . $key . '][option_id]', $options, $rcpOption->option_id, ['class' => 'form-control']) !!}
                                        </td>
                                        <td>
                                            {!! Form::text('column[' . $key . '][value]', old('column[' . $key . '][value]', $rcpOption->value), ['class' => 'form-control' . ($errors->has('column.' . $key . '.value') ? ' is-invalid' : ''), 'placeholder' => __('Значення')]) !!}
                                            @if ($errors->has('column.' . $key . '.value'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('column.' . $key . '.value') }}</strong>
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <button type="button" onclick="document.getElementById('option-row-{{ $key }}').remove()" class="btn btn-link" aria-label="{{ __('main.delete') }}">{{ __('Remove') }}</button>
                                        </td>
                                    </tr>
                                @endforeach
                                @if (old('column') !== NULL)
                                @php($total = count($rcp->options) * 2)
                                    @foreach (old('column') as $key => $rcpOption)
                                    	@if ($key >= count(json_decode($rcp->options)))
	                                        <tr id="option-row-{{ $key }}">
	                                            <td>
	                                                {!! Form::text('column[' . $key . '][name]', $rcpOption['name'], ['class' => 'form-control' . ($errors->has('column.' . $key . '.name') ? ' is-invalid' : ''), 'placeholder' => 'Назва']) !!}
	                                                @if ($errors->has('column.' . $key . '.name'))
	                                                    <span class="invalid-feedback" role="alert">
	                                                        <strong>{{ $errors->first('column.' . $key . '.name') }}</strong>
	                                                    </span>
	                                                @endif
	                                            </td>
	                                            <td>
	                                                {!! Form::text('column[' . $key . '][tag_name]', null, ['class' => 'form-control' . ($errors->has('column.' . $key . '.tag_name') ? ' is-invalid' : ''), 'placeholder' => __('Tag'), 'disabled' => 'disabled']) !!}
	                                                @if ($errors->has('column.' . $key . '.tag_name'))
	                                                    <span class="invalid-feedback" role="alert">
	                                                        <strong>{{ $errors->first('column.' . $key . '.tag_name') }}</strong>
	                                                    </span>
	                                                @endif
	                                            </td>
	                                            <td>
	                                            	{!! Form::select('column[' . $key . '][option_id]', $options, $rcpOption['option_id'], ['class' => 'form-control']) !!}
	                                            </td>
	                                            <td>
		                                            {!! Form::text('column[' . $key . '][value]', $rcpOption['value'], ['class' => 'form-control' . ($errors->has('column.' . $key . '.value') ? ' is-invalid' : ''), 'placeholder' => __('Значення')]) !!}
		                                            @if ($errors->has('column.' . $key . '.value'))
		                                                <span class="invalid-feedback" role="alert">
		                                                    <strong>{{ $errors->first('column.' . $key . '.value') }}</strong>
		                                                </span>
		                                            @endif
	                                            </td>
	                                            <td class="text-end">
	                                                <button type="button" onclick="document.getElementById('option-row-{{ $key }}').remove()" class="btn btn-link" aria-label="{{ __('main.delete') }}">{{ __('Remove') }}</button>
	                                            </td>
	                                        </tr>
	                                    @endif
                                    @endforeach
                                @else
                                    @php($total = count($rcp->options))
                                @endif
                            </tbody>
                            <tfoot class="table-light">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-end">
                                        <button type="button" onclick="addColumn();" class="btn btn-primary" aria-label="{{ __('main.add') }}">{{ __('Add') }}</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
	{!! Form::close() !!}
</div>
@endsection

@section('script')
<template id="table-field-tpl">
    <tr id="role-__index__">
    	<td><input type="text" id="name" name="column[__index__][name]" class="form-control" value="" placeholder="{{ __('Назва') }}" id="input-name__index__" /></td>
    	<td><input type="text" id="tag_name" name="column[__index__][tag_name]" class="form-control" value="" placeholder="{{ __('Tag') }}" id="input-tag_name__index__" disabled/></td>
        <td>
            {!! Form::select('column[__index__][option_id]', $options, null, ['class' => 'form-control']) !!}
        </td>
        <td><input type="text" id="value" name="column[__index__][value]" class="form-control" value="" placeholder="{{ __('Значення') }}" id="input-value__index__" /></td>
        <td class="text-end"><button type="button" onclick="document.getElementById('role-__index__').remove()" data-toggle="tooltip" title="Remove" class="btn btn-link">{{ __('Remove') }}</button></td>
    </tr>
</template>
<script>
var table_row = {{ $total }};
function addColumn() {
    document.querySelector('#table-fields tbody').insertAdjacentHTML("beforeend", document.getElementById('table-field-tpl').innerHTML.replace(/__index__/g, table_row));
    table_row++;
}
</script>
@endsection