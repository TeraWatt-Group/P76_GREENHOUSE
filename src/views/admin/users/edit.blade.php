@extends('layouts.admin')

@section('title', 'Admin | ' . __('Користувачі'))
@section('description', __('Користувачі'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('admin.index') }}">Панель адміністратора</a></li>
                    <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('admin.users.index') }}">{{ __('Користувачі') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Редагувати користувача (' . $users->name . ')') }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <h3 class="mb-0 pr-3">{{ __('Редагувати користувача (' . $users->name . ')') }}</h3>
            </div>
        </div>
    </div>
    {!! Form::model($users, ['role' => 'form', 'url' => route('admin.users.update', $users->id), 'method' => 'PUT']) !!}
        {{ Form::hidden('id', $users->id) }}
        <div class="row">
            <div class="col-12 mb-3">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.users.index') }}" aria-pressed="true" class="btn btn-secondary" role="button" aria-label="{{ __('main.back') }}">
                        {{ __('Back') }}
                    </a>
                    {!! Form::button(__('Save'), ['type' => 'submit', 'class' => 'btn btn-success ms-2', 'aria-label' => __('main.save')]) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body px-0">
                        <div class="form-group row px-3">
                            {!! Form::label('name', 'Name', ['class' => 'col-3 col-form-label text-md-end form-label-asterisk']) !!}

                            <div class="col-6">
                                {!! Form::text('name', $users->name, ['placeholder' => 'Name', 'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-3"></div>
                        </div>
                        <hr>
<!--                         <div class="form-group row px-3">
                            {!! Form::label('password', 'Password', ['class' => 'col-3 col-form-label text-md-end form-label-asterisk']) !!}

                            <div class="col-6">
                                {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '')], 'disabled') !!}
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-3"></div>
                        </div>
                        <hr> -->
                        <div class="form-group row px-3">
                            {!! Form::label('email', 'E-mail', ['class' => 'col-3 col-form-label text-md-end form-label-asterisk']) !!}

                            <div class="col-6">
                                {!! Form::text('email', $users->email, ['placeholder' => 'E-mail', 'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')]) !!}
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <table id="table-fields" class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th></th>
                                    <th>Ролі</th>
                                    <th>Дії</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users->roles as $key => $userRole)
                                    <tr id="role-{{ $key }}">
                                        <td></td>
                                        <td>
                                            <select class="form-select" name="role[{{ $key }}]">
                                                @foreach ($roles as $role)
                                                    @if ($userRole->name == $role)
                                                        <option value="{{ $role }}" selected>{{ $role }}</option>
                                                    @else
                                                        <option value="{{ $role }}">{{ $role }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if ($errors->has('role'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('role') }}</strong>
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <button type="button" onclick="document.getElementById('role-{{ $key }}').remove()" class="btn btn-link" aria-label="{{ __('main.delete') }}">{{ __('Remove') }}</button>
                                        </td>
                                    </tr>
                                @endforeach
                                @if (old('column') !== NULL)
                                @php($total = count($users->roles) * 2)
                                    @foreach (old('column') as $key => $column)
                                    @endforeach
                                @else
                                    @php($total = count($users->roles))
                                @endif
                            </tbody>
                            <tfoot class="table-light">
                                <tr>
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
        <td>
            <select name="role[__index__]" class="form-select">
                @foreach ($roles as $role)
                    <option value="{{ $role }}">{{ $role }}</option>';
                @endforeach
            </select>
        </td>
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
