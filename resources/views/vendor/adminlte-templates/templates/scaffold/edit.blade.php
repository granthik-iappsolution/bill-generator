@@extends('layouts.layoutMaster')

@@section('title')
    Edit {{ $config->modelNames->human }} - {{ config('app.name') }}
@@endsection

@@section('page_headers')
    <h3><i class="fa-duotone fa-users mr-2"></i>{{ $config->modelNames->humanPlural }}</h3>
@@endsection

@@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-style">
        <li class="breadcrumb-item"><a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.index') }}">{{ $config->modelNames->humanPlural }}</a></li>
        <li class="breadcrumb-item active">Edit</li>
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
                    <h4 class="mb-0">@{!! ${{ $config->modelNames->camel }}->name !!}</h4>
                </div>
            </div>
        </div>

        <div class="card-body">
            @@include('adminlte-templates::common.errors')
            @{!! html()->modelForm(${{ $config->modelNames->camel }},'PATCH',route('{{ $config->prefixes->getRoutePrefixWith('.') }}{{ $config->modelNames->camelPlural }}.update', ${{ $config->modelNames->camel }}->{{ $config->primaryName }}))
                ->acceptsFiles()
                ->class('submitsByAjax')
                ->open() !!}
            <div class="row">
                @@include('{{ $config->prefixes->getViewPrefixForInclude() }}{{ $config->modelNames->snakePlural }}.fields', ['type' => 'edit'])
            </div>
            @{!! html()->closeModelForm() !!}
        </div>
    </div>
@@endsection
