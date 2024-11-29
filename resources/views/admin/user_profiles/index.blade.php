@extends('layouts.layoutMaster')

@section('title')
    User Profiles - Bill-Generator
@endsection

@section('page_headers')
    <h3><i class="fa-duotone fa-users mr-2"></i>User Profiles</h3>
@endsection

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item"><a href="http://localhost/dashboard">Home</a></li>
            <li class="breadcrumb-item active">User Profiles</li>
        </ol>
    </nav>
@endsection

@section('page_buttons')
    {{-- <a class="btn btn-primary" href="{{ route('admin.user-profiles.create') }}"><i class="fa-solid fa-plus"></i> Add User Profiles</a> --}}
    <button class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#createUserProfile"><i class='bx bx-plus-circle me-1'></i> Add User Profiles</button>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="w-100 d-flex justify-content-between ">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0">User Profiles</h5>
                </div>
                <div class="d-flex align-items-center action_button">
                    {{-- <a href="{{ route('admin.user-profiles.create') }}" class="btn btn-lg btn-primary"><i class='bx bx-plus-circle me-1'></i> Add User Profiles</a> --}}
                    @can('sessions.create')
                    <button class="btn btn-lg btn-primary me-2" data-bs-toggle="modal" data-bs-target="#createUserProfile"><i class='bx bx-plus-circle me-1'></i> Add Sessions</button>
                    @endcan
                </div>
            </div>
        </div>
        <div class="card-datatable">
            @include('flash::message')
            @include('admin.user_profiles.table')
        </div>
    </div>
    @include('admin.user_profiles.create_modal')
@endsection
@push('stackedScripts')
    <script>
        $(document).ready(function() {
            @if ($errors->any())
            $('#createUserProfile').modal('show');
            @endif
        });
    </script>
@endpush
