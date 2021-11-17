@extends('layouts.app')

@section('title', __('Додати нове замовлення'))
@section('description', __('Додати нове замовлення'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('home') }}">Головна</a></li>
                    <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('user.greenhouse.orders.index') }}">Мої замовлення</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Додати нове замовлення') }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="d-flex align-content-start align-items-end">
                <h1 class="mb-0 pr-3">{{ __('Додати нове замовлення') }}</h1>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <div class="d-flex justify-content-start">

            </div>
        </div>
        <div class="col-6">
            <div class="col-12 mb-3">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('user.greenhouse.orders.index') }}" aria-pressed="true" class="btn btn-secondary" role="button" aria-label="{{ __('green.back') }}">
                        {{ __('green.back') }}
                    </a>
                    <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">{{ __('green.save') }}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        	<div class="form-group row py-3">
        	    {!! Form::label('equipment', __('Обладнання'), ['class' => 'col-3 col-form-label text-md-start'], false) !!}
        	    <div class="col-6">
        	        {!! Form::select('equipment', $equipment, 0, ['id' => 'equipment-select', 'class' => 'form-control']) !!}
        	        @if ($errors->has('equipment'))
        	            <span class="invalid-feedback" role="alert">
        	            <strong>{{ $errors->first('equipment') }}</strong>
        	        </span>
        	        @endif
        	    </div>
        	</div>
        	<div class="form-group row py-3">
        	    {!! Form::label('products', __('Продукт'), ['class' => 'col-3 col-form-label text-md-start'], false) !!}
        	    <div class="col-6">
        	        {!! Form::select('products', $products, 0, ['id' => 'product-select', 'class' => 'form-control']) !!}
        	        @if ($errors->has('products'))
        	            <span class="invalid-feedback" role="alert">
        	            <strong>{{ $errors->first('products') }}</strong>
        	        </span>
        	        @endif
        	    </div>
        	</div>
        	<div class="form-group row py-3">
        	    {!! Form::label('rcp', __('Рецепт'), ['class' => 'col-3 col-form-label text-md-start'], false) !!}
        	    <div class="col-6">
        	        {!! Form::select('rcp', $rcp, 0, ['id' => 'rcp-select', 'class' => 'form-control']) !!}
        	        @if ($errors->has('rcp'))
        	            <span class="invalid-feedback" role="alert">
        	            <strong>{{ $errors->first('rcp') }}</strong>
        	        </span>
        	        @endif
        	    </div>
        	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
	    <div class="modal-content">
	    	{{ Form::open(['url' => route('user.greenhouse.orders.store'), 'method' => 'POST']) }}
	        <div class="modal-header">
	        	<h5 class="modal-title" id="exampleModalLabel">Додати нове замовлення</h5>
	        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	        </div>
	        <div class="modal-body">
	            <div class="mb-3">
	            	<label for="equipment-name" class="col-form-label">{{ __('Обладнання') }}</label>
	            	<input type="text" class="form-control" id="equipment-name" disabled>
	            	<input name="equipment" type="hidden" id="equipment">
	            </div>
	            <div class="mb-3">
	            	<label for="message-text" class="col-form-label">{{ __('Продукт') }}</label>
	            	<input type="text" class="form-control" id="product-name" disabled>
	            	<input name="product" type="hidden" id="product">
	            </div>
	            <div class="mb-3">
	            	<label for="message-text" class="col-form-label">{{ __('Рецепт') }}</label>
	            	<input type="text" class="form-control" id="rcp-name" disabled>
	            	<input name="rcp" type="hidden" id="rcp">
	            </div>
	            <p>{{ __('Після натиснення кнопки "Зберегти" Ваше замовлення буде прийнято і вибраний рецепт почне свою роботу.') }}</p>
	        </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Скасувати') }}</button>
	        	<button type="submit" class="btn btn-primary">{{ __('Зберегти') }}</button>
	        </div>
	        {{ Form::close() }}
	    </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	var exampleModal = document.getElementById('exampleModal')
	exampleModal.addEventListener('show.bs.modal', function (event) {
		var e = document.getElementById("equipment-select")
		var eValue = e.options[e.selectedIndex].value
		var eText = e.options[e.selectedIndex].text
		var p = document.getElementById("product-select")
		var pValue = p.options[p.selectedIndex].value
		var pText = p.options[p.selectedIndex].text
		var r = document.getElementById("rcp-select")
		var rValue = r.options[r.selectedIndex].value
		var rText = r.options[r.selectedIndex].text

	    var modalBodyEquipment = exampleModal.querySelector('.modal-body #equipment')
	    var modalBodyEquipmentName = exampleModal.querySelector('.modal-body #equipment-name')
	    var modalBodyProduct = exampleModal.querySelector('.modal-body #product')
	    var modalBodyProductName = exampleModal.querySelector('.modal-body #product-name')
	    var modalBodyRcp = exampleModal.querySelector('.modal-body #rcp')
	    var modalBodyRcpName = exampleModal.querySelector('.modal-body #rcp-name')

	    modalBodyEquipment.value = eValue
	    modalBodyEquipmentName.value = eText
	    modalBodyProduct.value = pValue
	    modalBodyProductName.value = pText
	    modalBodyRcp.value = rValue
	    modalBodyRcpName.value = rText
	})
</script>
<script>
	document.getElementById('product-select').addEventListener('change', function() {
	    axi.rcp(this.value);
	});
    var axi = {
        'rcp': function(productid) {
			axios.get('{{ route("api.rcp.get_version") }}', {
				params: {
					productid: productid
				}
			})
			.then(function (response) {
				var rcp = document.getElementById('rcp-select');
				rcp.options.length=0;

				var keys = Object.keys(response.data.data_recieved.rcp);

				if (keys.length > 0) {
					for (var i = 0, len = keys.length; i < len; i++) {
					    rcp.options[i]=new Option(response.data.data_recieved.rcp[keys[i]], keys[i]);
					}
					rcp.disabled = false;
				} else {
					rcp.disabled = true;
				}
			})
			.catch(function (error) {
				console.log(error);
			})
			.then(function () {
				// always executed
			});
        },
    };
</script>
@endsection