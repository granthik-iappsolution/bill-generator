@extends('layouts.layoutMaster')

@php($configData = Helper::appClasses())

@section('title')
    Roles - {{ config('app.name') }}
@endsection

@section('page_headers')
    <h3><i class="fa-duotone fa-user-lock mr-2"></i>Roles</h3>
@endsection

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Roles</li>
        </ol>
    </nav>
@endsection

@section('page_buttons')
    <button class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#createRole"><i class='bx bx-plus-circle me-1'></i> Add Roles</button>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="w-100 d-flex justify-content-between ">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0">Roles</h5>
                </div>
                <div class="d-flex align-items-center action_button">
                    <button class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#createRole"><i class='bx bx-plus-circle me-1'></i> Add Roles</button>
                </div>
            </div>
        </div>
        <div class="card-datatable">
            @include('flash::message')
            @include('admin.roles.table')
        </div>
        @include('admin.roles.create_modal')
    </div>
@endsection

