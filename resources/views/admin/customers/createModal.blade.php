<div class="modal fade" id="customerFormModal" tabindex="-1" aria-labelledby="customerFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customerFormModalLabel">Add Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! html()->form('POST', route('admin.customers.store'))
                ->attribute('files', true)
                ->class('submitsByAjaxCreate')->open() !!}
            <div class="modal-body">
                <div class="row">
                    <!-- Name Field -->
                    <div class="form-group mb-3 col-sm-6">
                        {!! html()->label('Name')->for('name') !!}
                        {!! html()->text('name')->class('form-control') !!}
                    </div>

                    <!-- Address Field -->
                    <div class="form-group mb-3 col-sm-6">
                        {!! html()->label('Address')->for('address') !!}
                        {!! html()->text('address')->class('form-control') !!}
                    </div>

                    <!-- Pincode Field -->
                    <div class="form-group mb-3 col-sm-6">
                        {!! html()->label('Pincode')->for('pincode') !!}
                        {!! html()->text('pincode')->class('form-control') !!}
                    </div>

                    <!-- City Field -->
                    <div class="form-group mb-3 col-sm-6">
                        {!! html()->label('City')->for('city') !!}
                        {!! html()->text('city')->class('form-control') !!}
                    </div>

                    <!-- State Field -->
                    <div class="form-group mb-3 col-sm-6">
                        {!! html()->label('State')->for('state') !!}
                        {!! html()->text('state')->class('form-control') !!}
                    </div>

                    <!-- Country Field -->
                    <div class="form-group mb-3 col-sm-6">
                        {!! html()->label('Country')->for('country') !!}
                        {!! html()->text('country')->class('form-control') !!}
                    </div>

                    <!-- Mobile Field -->
                    <div class="form-group mb-3 col-sm-6">
                        {!! html()->label('Mobile')->for('mobile') !!}
                        {!! html()->text('mobile')->class('form-control') !!}
                    </div>

                    <!-- Email Field -->
                    <div class="form-group mb-3 col-sm-6">
                        {!! html()->label('Email')->for('email') !!}
                        {!! html()->email('email')->class('form-control') !!}
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
                if (typeof LaravelDataTables !== 'undefined' && LaravelDataTables['customer-index']) {
                    LaravelDataTables['customer-index'].ajax.reload(null, false);
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
