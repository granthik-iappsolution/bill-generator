@extends('layouts.layoutMaster')

@section('title')
    Edit Item - Bill-Generator
@endsection

@section('page_headers')
    <h3><i class="fa-duotone fa-users mr-2"></i>Items</h3>
@endsection

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-style">
        <li class="breadcrumb-item"><a href="{{ route('admin.items.index') }}">Items</a></li>
        <li class="breadcrumb-item active">Edit</li>
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
                    <h4 class="mb-0">{!! $item->name !!}</h4>
                </div>
            </div>
        </div>

        <div class="card-body">
            @include('adminlte-templates::common.errors')
            {!! html()->modelForm($item,'PATCH',route('admin.items.update', $item->uuid))
                ->acceptsFiles()
                ->class('submitsByAjax')
                ->open() !!}
            <div class="row">
                @include('admin.items.fields', ['type' => 'edit'])
            </div>
            {!! html()->closeModelForm() !!}
        </div>
    </div>
@endsection
