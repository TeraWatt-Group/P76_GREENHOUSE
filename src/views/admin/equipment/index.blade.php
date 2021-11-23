@extends('layouts.admin')

@section('title', 'Admin | ' . __('Обладнання'))
@section('description', __('Обладнання'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('admin.index') }}">Панель адміністратора</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Обладнання') }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="d-flex align-content-start align-items-end">
                <h3 class="mb-0 pr-3">{{ __('Обладнання') }}</h3>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <div class="d-flex justify-content-start">
                <div class="input-group w-50">
                    <x-input.input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="{{ __('Search') }}"/>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="d-flex justify-content-end">
                <a role="button" aria-pressed="true" class="btn btn-primary ms-2" role="button" href="{{ route('admin.equipment.create') }}" aria-label="{{ __('Add') }}">
                    {{ __('Add') }}
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body p-0">
                    <div wire:loading.delay class="preloader">
                        <div class="d-flex justify-content-center align-items-center h-100"><div class="spinner-grow" role="status"></div></div>
                    </div>
                    <x-table>
                        <x-slot name="head">
                            <x-table.header class="w-0">
                                <x-input.checkbox wire:model="selectPage" />
                            </x-table.header>
                            <x-table.header sortable wire:click="sortBy('name')" :direction="$sorts['name'] ?? null" class="w-15">Користувач</x-table.header>
                            <x-table.header sortable wire:click="sortBy('email')" :direction="$sorts['email'] ?? null" class="w-20">Email</x-table.header>
                            <x-table.header sortable wire:click="sortBy('username')" :direction="$sorts['username'] ?? null" class="w-15">Ім'я</x-table.header>
                            <x-table.header>Ролі</x-table.header>
                            <x-table.header class="w-15">Активність</x-table.header>
                        </x-slot>
                        <x-slot name="body">
                            @forelse ($rows as $row)
                                <x-table.row>
                                    <x-table.cell>

                                    </x-table.cell>
                                    <x-table.cell><a href="{{ route('admin.equipment.edit', $row->equipmentid) }}" aria-label="{{ __('Edit') }}">{{ $row->descriptions->name }}</a></x-table.cell>
                                    <x-table.cell>{{ $row->email }}</x-table.cell>
                                    <x-table.cell>{{ $row->username }}</x-table.cell>
                                    <x-table.cell>

                                    </x-table.cell>
                                    <x-table.cell>

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
                <div class="card-footer">
                    {{ $rows->onEachSide(1)->links('pagination.lw-traditional') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
