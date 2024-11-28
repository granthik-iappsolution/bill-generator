@extends('layouts.layoutMaster')

@section('title')
    Change Password - {{ config('app.name') }}
@endsection

@section('page_headers')
    <h3><i class="fa-duotone fa-key mr-2"></i>Change Password</h3>
@endsection

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
            <li class="breadcrumb-item active">Change Password</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card">

        <div class="card-header">
            <div class="w-100 d-flex justify-content-between ">
                <div class="d-flex align-items-center">
                    <h4 class="mb-0">Change Password of Account: {{ request()->route('user')->name }}</h4>
                </div>
                <div class="d-flex align-items-center action_button">
                    @include('admin.users.datatables_actions', ['uuid' => request()->route('user')->uuid])
                </div>
            </div>
        </div>

        <div class="card-body">
            @include('adminlte-templates::common.errors')
            {!! html()->form('POST', route('admin.users.changePassword.process', request()->route('user')))
                ->class('submitsByAjax')
                ->acceptsFiles()
                ->open() !!}

                <div class="row">
                    <!-- Password Field -->
                    <div class="mb-3 col-md-6">
                        <div class="form-password-toggle">
                            {!! html()->label('New Password:', 'new_password')->class('form-label') !!}
                            <div class="input-group input-group-merge">
                                {!! html()->password('new_password')
                                    ->class('form-control')
                                    ->placeholder('New Password of the user') !!}
                                <span class="input-group-text cursor-pointer" id="basic-default-password">
                                    <i class="bx bx-hide"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <div class="form-password-toggle">
                            {!! html()->label('Confirm Password:', 'confirm_password')->class('form-label') !!}
                            <div class="input-group input-group-merge">
                                {!! html()->password('confirm_password')
                                    ->class('form-control')
                                    ->placeholder('Confirm password of the user') !!}
                                <span class="input-group-text cursor-pointer" id="basic-default-password">
                                    <i class="bx bx-hide"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Field -->
                    <div class="mt-3 col-md-12 fields_footer_action_buttons">
                        <button class="btn btn-lg btn-success rspSuccessBtns me-2" type="submit">
                            <i class='tf-icons bx bx-save action_btn me-1'></i> SAVE
                        </button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-lg btn-outline-danger">
                            <i class='bx bx-arrow-to-left action_btn me-1'></i> BACK
                        </a>
                    </div>
                </div>
            {!! html()->form()->close() !!}
        </div>

    </div>
@endsection

@push('stackedScripts')
    <script>
        $('.submitsByAjax').submit(function (e) {
            e.preventDefault();
            let type = '{{ $type ?? '' }}'
            let dataToPass = new FormData($(this)[0]);
            ajaxCallFormSubmit($(this), false, 'Loading! Please wait...', dataToPass,
                type === 'edit' ? postCreate : undefined);
        });
    </script>
@endpush
