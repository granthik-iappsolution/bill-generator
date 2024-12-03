<!-- Name Field -->
<div class="form-group mb-3 col-sm-6">
            {!! html()->label('Name')->for('name') !!}
            {!! html()->text('name', null)->class('form-control') !!}
</div>


<!-- Address Field -->
<div class="form-group mb-3 col-sm-6">
            {!! html()->label('Address')->for('address') !!}
            {!! html()->text('address', null)->class('form-control') !!}
</div>


<!-- Pincode Field -->
<div class="form-group mb-3 col-sm-6">
            {!! html()->label('Pincode')->for('pincode') !!}
            {!! html()->text('pincode', null)->class('form-control') !!}
</div>


<!-- City Field -->
<div class="form-group mb-3 col-sm-6">
            {!! html()->label('City')->for('city') !!}
            {!! html()->text('city', null)->class('form-control') !!}
</div>


<!-- State Field -->
<div class="form-group mb-3 col-sm-6">
            {!! html()->label('State')->for('state') !!}
            {!! html()->text('state', null)->class('form-control') !!}
</div>


<!-- Country Field -->
<div class="form-group mb-3 col-sm-6">
            {!! html()->label('Country')->for('country') !!}
            {!! html()->text('country', null)->class('form-control') !!}
</div>


<!-- Mobile Field -->
<div class="form-group mb-3 col-sm-6">
            {!! html()->label('Mobile')->for('mobile') !!}
            {!! html()->text('mobile', null)->class('form-control') !!}
</div>


<!-- Email Field -->
<div class="form-group mb-3 col-sm-6">
            {!! html()->label('Email')->for('email') !!}
            {!! html()->text('email', null)->class('form-control') !!}
</div>


<!-- Submit Field -->
<div class="mt-3 col-md-12 fields_footer_action_buttons">
    <button class="btn btn-lg btn-success rspSuccessBtns me-2" type="submit" ><i class='tf-icons bx bx-save action_btn me-1'></i> SAVE</button>
    <a href="{{ route('admin.customers.index') }}" class="btn btn-lg btn-outline-danger"><i class='bx bx-arrow-to-left action_btn me-1' ></i> BACK</a>
</div>
@push('stackedScripts')
    <script src="{{ asset('js/regAnother.js') }}"></script>

    <script>

        $('.submitsByAjaxEdit').submit(function (e) {
            e.preventDefault();
            let type = ''
            let dataToPass = new FormData($(this)[0]);
            ajaxCallFormSubmit($(this), false, 'Loading! Please wait...', dataToPass,
                type === 'create' ? postCreate : undefined);
        });

        function postCreate(){
            switch_between_register_to_registerAnother_btn($('.submitsByAjaxEdit'), false)
        }
    </script>
@endpush
