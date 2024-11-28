@extends('layouts.layoutMaster')

@section('title')
    Users - {{ config('app.name') }}
@endsection

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
        </ol>
    </nav>
@endsection

@section('content')
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header">
            <div class="w-100 d-flex justify-content-between ">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0">Users</h5>
                </div>
                <div class="d-flex align-items-center action_button">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-lg btn-primary"><i class='bx bx-plus-circle me-1'></i> Add User</a>
                </div>
            </div>
        </div>
        <div class="card-datatable">
            @include('flash::message')
            @include('admin.users.table')
        </div>
    </div>
@endsection

