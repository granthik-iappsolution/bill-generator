@@extends('layouts.layoutMaster')

@@section('title')
    Create {{ $config->modelNames->human }} - {{ config('app.name') }}
@@endsection

@@section('page_headers')
    <h3><i class="fa-duotone fa-users mr-2"></i>{{ $config->modelNames->humanPlural }}</h3>
@@endsection

@@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item"><a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.index') }}">{{ $config->modelNames->humanPlural }}</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
@@endsection


@@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Create {{ $config->modelNames->human }}</h4>
        </div>
        <div class="card-body">
            @@include('adminlte-templates::common.errors')
            @{!! html()->form('POST', route('{{ $config->prefixes->getRoutePrefixWith('.') }}{{ $config->modelNames->camelPlural }}.store'))
                ->acceptsFiles()
                ->class('submitsByAjax')
                ->open() !!}
            <div class="row">
                @@include('{{ $config->prefixes->getViewPrefixForInclude() }}{{ $config->modelNames->snakePlural }}.fields', ['type' => 'create'])
            </div>
            @{!! html()->form()->close() !!}
        </div>
    </div>
@@endsection
