@props([
	'label',
	'for',
])

<div class="mb-3 row">
    <label for="{{ $for }}" class="col-sm-2 col-form-label">{{ $label }}</label>
    <div class="col-sm-10">
    	{{ $slot }}
    </div>
</div>