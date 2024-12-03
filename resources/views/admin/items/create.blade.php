@extends('layouts.layoutMaster')

@section('title')
    Create Item - Bill-Generator
@endsection

@section('page_headers')
    <h3><i class="fa-duotone fa-users mr-2"></i>Items</h3>
@endsection

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item"><a href="{{ route('admin.items.index') }}">Items</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Create Item</h4>
        </div>
        <div class="card-body">
            @include('adminlte-templates::common.errors')
        </div>
    </div>
@endsection
