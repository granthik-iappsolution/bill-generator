@extends('layouts.layoutMaster')

@section('title')
    Items - Bill-Generator
@endsection

@section('page_headers')
    <h3><i class="fa-duotone fa-users mr-2"></i>Items</h3>
@endsection

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item"><a href="http://localhost/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Items</li>
        </ol>
    </nav>
@endsection

@section('page_buttons')
    <a class="btn btn-primary" href="{{ route('admin.items.create') }}"><i class="fa-solid fa-plus"></i> Add Items</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="w-100 d-flex justify-content-between ">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0">Items</h5>
                </div>
                <div class="d-flex align-items-center action_button">
                    <a href="{{ route('admin.items.create') }}" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#itemFormModal"><i class='bx bx-plus-circle me-1'></i> Add Items</a>
                </div>
            </div>
        </div>
        <div class="card-datatable">
            @include('flash::message')
            @include('admin.items.table')
            @include('admin.items.createModal')
        </div>
    </div>
@endsection
