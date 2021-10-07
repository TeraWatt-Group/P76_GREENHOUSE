@props([
	'sortable' => null,
	'direction' => null,
])

<th
	@unless ($sortable)
		{{ $attributes }}
	@else
		{{ $attributes->merge(['class' => 'cursor-pointer']) }}
	@endunless
>
	@unless ($sortable)
		<span class="text-uppercase">{{ $slot }}</span>
	@else
        <div class="d-flex flex-row">
			<span class="text-uppercase me-1">{{ $slot }}</span>
			<span class="">
				@if  ($direction === 'asc')
					<span class="arrow-up"></span>
				@elseif ($direction === 'desc')
					<span class="arrow-down"></span>
				@else

				@endif
			</span>
        </div>
	@endunless
</th>
