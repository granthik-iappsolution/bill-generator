@section('css')
    @include('admin.layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%', 'class' => 'table', 'id' => 'User-index']) !!}
@push('stackedScripts')
    @include('admin.layouts.datatables_js')
    {!! $dataTable->scripts() !!}
    <script>
        function updateStatus(ref) {
            var userId = ref.data('user-id');
            let updateStatus = ajaxCallRequest('{{route('admin.updateStatus','%%USER-ID%%')}}'.replace(/%%USER-ID%%/g,userId),
                'POST', {}, true, 'Updating the Status... Hang on! 😎');
            updateStatus.then(function (data) {
                toastr['success'](data.message)
                LaravelDataTables['User-index'].ajax.reload(null, false);
            });
        }
    </script>

@endpush


