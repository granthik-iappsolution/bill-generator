@extends('layouts.layoutMaster')

@section('title')
    Show User - {{ config('app.name') }}
@endsection

@section('page_headers')
    <h3><i class="fa-duotone fa-users mr-2"></i>Users</h3>
@endsection

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
            <li class="breadcrumb-item active">View</li>
        </ol>
    </nav>
@endsection

@section('page_buttons')
    <a class="btn btn-primary" href="{{ route('admin.users.create') }}"><i class="fa-solid fa-plus"></i> Add Users</a>
@endsection

@section('content')
    <div class="card">

        <div class="card-header">
            <div class="w-100 d-flex justify-content-between ">
                <div class="d-flex align-items-center">
                    <h4 class="mb-0">{{ $user->name }}</h4>
                </div>
                <div class="d-flex align-items-center action_button">
                    @include('admin.users.datatables_actions', ['uuid' => $user->uuid])
                </div>
            </div>
        </div>

        <div class="card-body">
            <div id="showuser">
                {!! html()->model($user)->form('PATCH', route('admin.users.update', $user->id))->open()->attr('enctype', 'multipart/form-data') !!}

                    <div class="row">
                        @include('admin.users.fields', ['type' => 'show'])
                    </div>

                {!! html()->form()->close() !!}

            </div>
        </div>

        <div class="card-footer">
            @include('components.sneat.model_created_updated_meta', ['model' => $user])
        </div>
    </div>
@endsection


@push('stackedScripts')
<script>
    disableInputsForView($('#showuser'));
</script>
@endpush