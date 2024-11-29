@extends('layouts.layoutMaster')

@section('title')
    Create User - {{ config('app.name') }}
@endsection

@section('page_headers')
    <h3><i class="fa-duotone fa-users mr-2"></i>Users</h3>
@endsection

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Create User</h4>
        </div>
        <div class="card-body">
            @include('adminlte-templates::common.errors')
            {!! html()->form('POST', route('admin.users.store'))
                ->class('submitsByAjax')
                ->acceptsFiles()
                ->open() !!}

                <div class="row">
                    @include('admin.users.fields',['type' => 'create'])
                </div>

            {!! html()->form()->close() !!}
        </div>
    </div>
@endsection
