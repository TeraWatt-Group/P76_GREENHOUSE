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
        	    {!! Form::label('equipment', __('equipment'), ['class' => 'col-3 col-form-label text-md-start'], false) !!}
        	    <div class="col-6">
        	        {!! Form::select('equipment', $equipment, 0, ['class' => 'form-control']) !!}
        	        @if ($errors->has('equipment'))
        	            <span class="invalid-feedback" role="alert">
        	            <strong>{{ $errors->first('equipment') }}</strong>
        	        </span>
        	        @endif
        	    </div>
        	</div>
        	<div class="form-group row py-3">
        	    {!! Form::label('products', __('products'), ['class' => 'col-3 col-form-label text-md-start'], false) !!}
        	    <div class="col-6">
        	        {!! Form::select('products', $products, 0, ['id' => 'products', 'class' => 'form-control']) !!}
        	        @if ($errors->has('products'))
        	            <span class="invalid-feedback" role="alert">
        	            <strong>{{ $errors->first('products') }}</strong>
        	        </span>
        	        @endif
        	    </div>
        	</div>
        	<div class="form-group row py-3">
        	    {!! Form::label('rcp', __('rcp'), ['class' => 'col-3 col-form-label text-md-start'], false) !!}
        	    <div class="col-6">
        	        {!! Form::select('rcp', $rcp, 0, ['id' => 'rcp', 'class' => 'form-control']) !!}
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
	{{ Form::open(['url' => route('user.greenhouse.orders.store'), 'method' => 'POST']) }}
	    <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Додати нове замовлення</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		        <form>
		          <div class="mb-3">
		            <label for="recipient-name" class="col-form-label">Recipient:</label>
		            <input type="text" class="form-control" id="recipient-name">
		          </div>
		          <div class="mb-3">
		            <label for="message-text" class="col-form-label">Message:</label>
		            <textarea class="form-control" id="message-text"></textarea>
		          </div>
		        </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Send message</button>
		      </div>
		    </div>
	    </div>
  	{{ Form::close() }}
</div>
@endsection

@section('script')
<script type="text/javascript">
	var exampleModal = document.getElementById('exampleModal')
	exampleModal.addEventListener('show.bs.modal', function (event) {
	  // Button that triggered the modal
	  var button = event.relatedTarget
	  // Extract info from data-bs-* attributes
	  var recipient = button.getAttribute('data-bs-whatever')
	  // If necessary, you could initiate an AJAX request here
	  // and then do the updating in a callback.
	  //
	  // Update the modal's content.
	  var modalTitle = exampleModal.querySelector('.modal-title')
	  var modalBodyInput = exampleModal.querySelector('.modal-body input')

	  modalTitle.textContent = 'New message to ' + recipient
	  modalBodyInput.value = recipient
	})
</script>
<script>
	document.getElementById('products').addEventListener('change', function() {
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
				var rcp = document.getElementById('rcp');
				rcp.options.length=0;

				var keys = Object.keys(response.data.data_recieved);

				if (keys.length > 0) {
					for (var i = 0, len = keys.length; i < len; i++) {
					    // console.log(response.data.data_recieved[keys[i]]);
					    rcp.options[i]=new Option(response.data.data_recieved[keys[i]], keys[i]);
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