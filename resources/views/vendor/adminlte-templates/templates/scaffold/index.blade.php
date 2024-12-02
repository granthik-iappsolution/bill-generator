@@extends('layouts.layoutMaster')

@@section('title')
    {{ $config->modelNames->humanPlural }} - {{ config('app.name') }}
@@endsection

@@section('page_headers')
    <h3><i class="fa-duotone fa-users mr-2"></i>{{ $config->modelNames->humanPlural }}</h3>
@@endsection

@@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">{{ $config->modelNames->humanPlural }}</li>
        </ol>
    </nav>
@@endsection

@@section('page_buttons')
    <a class="btn btn-primary" href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.create') }}"><i class="fa-solid fa-plus"></i> Add {{ $config->modelNames->humanPlural }}</a>
@@endsection

@@section('content')
    <div class="card">
        <div class="card-header">
            <div class="w-100 d-flex justify-content-between ">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0">{{ $config->modelNames->humanPlural }}</h5>
                </div>
                <div class="d-flex align-items-center action_button">
                    <a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.create') }}" class="btn btn-lg btn-primary"><i class='bx bx-plus-circle me-1'></i> Add {{ $config->modelNames->humanPlural }}</a>
                </div>
            </div>
        </div>
        <div class="card-datatable">
            @@include('flash::message')
            {!! $table !!}
        </div>
    </div>
@@endsection
