@extends('layouts.admin')

@section('title', 'Admin | ' . __('admin.logs'))
@section('description', __('admin.logs'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('admin.index') }}">{{ __('Панель адміністратора') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Логи') }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-2">
            <div class="d-flex align-content-start align-items-end">
                <h3 class="mb-0 pr-3">{{ __('Логи') }}</h3>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-12">
            <h4 class="fw-bold">{{ $data['log']['current_file'] }}</h4>
            <div class="d-flex justify-content-between">
                @if($data['log']['current_file'])
                    <div class="align-bottom">
                        <div class="d-flex flex-row align-bottom">
                            <div class="d-inline ps-0 p-2 me-2 fw-bold text-secondary">Розмір: {{ $data['log']['current_file_size'] }}</div>
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-danger ms-2" href="?del={{ \Illuminate\Support\Facades\Crypt::encrypt($data['log']['current_folder'] ? $data['log']['current_folder'] . "/" . $data['log']['current_file'] : $data['log']['current_file']) }}{{ ($data['log']['current_folder']) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($data['log']['current_folder']) : '' }}">
                            Delete file
                        </a>
                        <a class="btn btn-secondary ms-2" href="?dl={{ \Illuminate\Support\Facades\Crypt::encrypt($data['log']['current_folder'] ? $data['log']['current_folder'] . "/" . $data['log']['current_file'] : $data['log']['current_file']) }}{{ ($data['log']['current_folder']) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($data['log']['current_folder']) : '' }}">
                            Download file
                        </a>
                        <a class="btn btn-secondary ms-2" href="?clean={{ \Illuminate\Support\Facades\Crypt::encrypt($data['log']['current_folder'] ? $data['log']['current_folder'] . "/" . $data['log']['current_file'] : $data['log']['current_file']) }}{{ ($data['log']['current_folder']) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($data['log']['current_folder']) : '' }}">
                            Clean file
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="list-group text-center mb-3">
                @foreach($data['log']['files'] as $file)
                    <a href="?l={{ \Illuminate\Support\Facades\Crypt::encrypt($file) }}" class="list-group-item list-group-item-action @if ($data['log']['current_file'] == $file) active @endif">
                        {{ $file }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-md-10">
            <div class="card mb-3">
                <div class="card-body p-0">
                    <x-table>
                        <x-slot name="head">
                            <x-table.header>Env</x-table.header>
                            <x-table.header>Type</x-table.header>
                            <x-table.header>Message</x-table.header>
                            <x-table.header></x-table.header>
                        </x-slot>
                        <x-slot name="body">
                            @forelse ($data['log']['logs'] as $key => $log)
                                <x-table.row>
                                    <x-table.cell>
                                        <span class="badge bg-{{ $log['level_class'] }} text-uppercase">{{ $log['level'] }}</span>
                                    </x-table.cell>
                                    <x-table.cell class="fw-bold">
                                        {{ $log['context'] }}
                                    </x-table.cell>
                                    <x-table.cell>
                                        <p><strong>{{ $log['date'] }}</strong></p>
                                        <small class="font-monospace text-break">{!! $log['text'] !!}</small>
                                    </x-table.cell>
                                    <x-table.cell class="fw-bold">
                                        @if ($log['stack'] != '')
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="collapse" data-bs-target="#collapse_{{ $key }}">Exception</button>
                                        @endif
                                    </x-table.cell>
                                </x-table.row>
                                @if ($log['stack'] != '')
                                    <x-table.row>
                                        <x-table.cell colspan="4" class="bg-dark text-white p-0">
                                            <div id="collapse_{{ $key }}" class="collapse in">
                                                <div class="overflow-auto m-3" style="height: 300px">
                                                    {{ $log['stack'] }}
                                                </div>
                                            </div>
                                        </x-table.cell>
                                    </x-table.row>
                                @endif
                            @empty
                                <x-table.row>
                                    <x-table.cell colspan="6" class="text-center p-3">
                                        {{ __('No data found.') }}
                                    </x-table.cell>
                                </x-table.row>
                            @endforelse
                        </x-slot>
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
