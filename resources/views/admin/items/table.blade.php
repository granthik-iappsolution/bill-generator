@section('css')
    @include('admin.layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%', 'class' => 'table', 'id' => 'item-index']) !!}

@push('stackedScripts')
    @include('admin.layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endpush