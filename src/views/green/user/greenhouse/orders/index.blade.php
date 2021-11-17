@extends('layouts.app')

@section('title', __('Мої замовлення'))
@section('description', __('Мої замовлення'))

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a class="link-secondary" href="{{ route('home') }}">Головна</a></li>
					<li class="breadcrumb-item active" aria-current="page">{{ __('Мої замовлення') }}</li>
				</ol>
			</nav>
		</div>
	</div>
	<div class="row mb-3">
		<div class="col-12">
			<div class="d-flex align-content-start align-items-end">
				<h1 class="mb-0 pr-3">{{ __('Мої замовлення') }}</h1>
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
				<a role="button" aria-pressed="true" class="btn btn-primary ms-2" role="button" href="{{ route('user.greenhouse.orders.create') }}" aria-label="{{ __('Додати') }}">
					{{ __('Додати') }}
				</a>
			</div>
		</div>
	</div>

	<x-table>
		<x-slot name="head">
			<x-table.header>Номер</x-table.header>
			<x-table.header>Теплиця</x-table.header>
			<x-table.header>Продукт</x-table.header>
			<x-table.header>Рецепт</x-table.header>
			<x-table.header class="w-15">Статус</x-table.header>
		</x-slot>
		<x-slot name="body">
			@forelse ($orders as $order)
				<x-table.row>
					<x-table.cell><b>{{ 'GREEN' . $order->orderid }}</b></x-table.cell>
					<x-table.cell>{{ $order->equipments->name }}</x-table.cell>
					<x-table.cell>{{ $order->products->name }}</x-table.cell>
					<x-table.cell>{{ $order->rcps->rcp_version }}</x-table.cell>
					<x-table.cell>
						@switch($order->status)
							@case(0)
								<span class="badge bg-primary p-1">{{ __('В роботі') }}</span>
								@break

							@case(1)
								<span class="badge bg-success p-1">{{ __('Виконано') }}</span>
								@break

							@case(2) @default
								<span class="badge bg-danger p-1">{{ __('Зупинено') }}</span>
						@endswitch
					</x-table.cell>
				</x-table.row>
			@empty
				<x-table.row>
					<x-table.cell colspan="7" class="text-center p-3">
						{{ __('No data found.') }}
					</x-table.cell>
				</x-table.row>
			@endforelse
		</x-slot>
	</x-table>

</div>
@endsection