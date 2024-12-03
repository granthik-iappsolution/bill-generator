<div class="modal fade" id="itemFormModal" tabindex="-1" aria-labelledby="itemFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemFormModalLabel">Add Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! html()->form('POST', route('admin.items.store'))
                ->attribute('files', true)
                ->class('submitsByAjaxCreate')->open() !!}
            <div class="modal-body">
                <div class="row">
                    <!-- Name Field -->
                    <div class="form-group mb-3 col-sm-6">
                        {!! html()->label('Name')->for('name') !!}
                        {!! html()->text('name', null)->class('form-control') !!}
                    </div>


                    <!-- Description Field -->
                    <div class="form-group mb-3 col-sm-6">
                        {!! html()->label('Description')->for('description') !!}
                        {!! html()->text('description', null)->class('form-control') !!}
                    </div>


                    <!-- Sold Qty Field -->
                    <div class="form-group mb-3 col-sm-6">
                        {!! html()->label('Sold Qty')->for('sold_qty') !!}
                        {!! html()->text('sold_qty', null)->class('form-control') !!}
                    </div>


                    <!-- Rate Field -->
                    <div class="form-group mb-3 col-sm-6">
                        {!! html()->label('Rate')->for('rate') !!}
                        {!! html()->text('rate', null)->class('form-control') !!}
                    </div>


                    <!-- Discount Field -->
                    <div class="form-group mb-3 col-sm-6">
                        {!! html()->label('Discount')->for('discount') !!}
                        {!! html()->text('discount', null)->class('form-control') !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-success rspSuccessBtns" type="submit">
                    <i class='tf-icons bx bx-save action_btn me-1'></i> SAVE
                </button>
            </div>
            {!! html()->closeModelForm() !!}
        </div>
    </div>
</div>

@push('stackedScripts')
    <script src="{{ asset('js/regAnother.js') }}"></script>

    <script>
        $('.submitsByAjaxCreate').submit(function (e) {
            e.preventDefault();
            let type = '';
            let dataToPass = new FormData($(this)[0]);

            ajaxCallFormSubmit($(this), false, 'Loading! Please wait...', dataToPass, function() {
                if (type === 'create') {
                    postCreate();
                }
                if (typeof LaravelDataTables !== 'undefined' && LaravelDataTables['item-index']) {
                    LaravelDataTables['item-index'].ajax.reload(null, false);
                } else {
                    console.error("DataTable instance not found. Ensure 'tableId' matches your DataTable ID.");
                }
            });
        });

        function postCreate() {
            switch_between_register_to_registerAnother_btn($('.submitsByAjaxCreate'), false);
        }
    </script>
@endpush
