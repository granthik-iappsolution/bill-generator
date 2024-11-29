@extends('layouts.layoutMaster')

@section('title')
    Edit User Profile - Bill-Generator
@endsection

@section('page_headers')
    <h3><i class="fa-duotone fa-users mr-2"></i>User Profiles</h3>
@endsection

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-style">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.user-profiles.index') }}">User Profiles</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
</nav>
@endsection

@section('page_buttons')
    <a class="btn btn-primary" href="{{ route('admin.user-profiles.create') }}"><i class="fa-solid fa-plus"></i> Add User Profiles</a>
@endsection

@section('content')
    <div class="card">

        <div class="card-header">
            <div class="w-100 d-flex justify-content-between ">
                <div class="d-flex align-items-center">
                    <h4 class="mb-0">{!! $userProfile->name !!}</h4>
                </div>
            </div>
        </div>

        <div class="card-body">
            @include('adminlte-templates::common.errors')
            {!! html()->modelForm($userProfile,'PATCH',route('admin.user-profiles.update', $userProfile->uuid))
                ->acceptsFiles()
                ->class('submitsByAjax')
                ->open() !!}
            <div class="row">
                {{-- @include('admin.user_profiles.fields', ['type' => 'edit']) --}}
                @include('admin.user_profiles.fields.master', ['type' => 'edit'])
            </div>
            {!! html()->closeModelForm() !!}
        </div>
    </div>
@endsection
@push('stackedScripts')
    @include('admin.user_profiles.editScripts')
@endpush
