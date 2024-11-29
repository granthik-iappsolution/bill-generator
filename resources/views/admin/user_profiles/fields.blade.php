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

<!-- Email Field -->
<div class="form-group mb-3 col-sm-6">
    {!! html()->label('Email')->for('email') !!}
    {!! html()->text('email', null)->class('form-control') !!}
</div>

<!-- Mobile Field -->
<div class="form-group mb-3 col-sm-6">
    {!! html()->label('Mobile')->for('mobile') !!}
    {!! html()->number('mobile', null)->class('form-control') !!}
</div>

<!-- Website Field -->
<div class="form-group mb-3 col-sm-6">
            {!! html()->label('Website')->for('website') !!}
            {!! html()->text('website', null)->class('form-control') !!}
</div>

<!-- Is Company Field -->
<div class="form-group mb-3 col-sm-6">
    <div class="form-check">
        {!! html()->hidden('is_company', 0) !!}
        {!! html()->checkbox('is_company', '1', null)->class('form-check-input') !!}
        {!! html()->label('is_company', 'Is Company')->class('form-check-label') !!}
    </div>
</div>

<!-- Logo Field -->
<div class="form-group mb-3 col-sm-6">
            {!! html()->label('Logo')->for('logo') !!}
            {!! html()->text('logo', null)->class('form-control') !!}
</div>

<!-- Sign Field -->
<div class="form-group mb-3 col-sm-6">
            {!! html()->label('Sign')->for('sign') !!}
            {!! html()->text('sign', null)->class('form-control') !!}
</div>

<!-- Upi Code Field -->
<div class="form-group mb-3 col-sm-6">
            {!! html()->label('Upi Code')->for('upi_code') !!}
            {!! html()->text('upi_code', null)->class('form-control') !!}
</div>

<!-- Default Template Id Field -->
<div class="form-group mb-3 col-sm-6">
            {!! html()->label('Default Template Id')->for('default_template_id') !!}
            {!! html()->select('default_template_id', [], null)->class('form-control custom-select') !!}
</div>

<!-- Enable Gst Field -->
<div class="form-group mb-3 col-sm-6">
    <div class="form-check">
        {!! html()->hidden('enable_gst', 0) !!}
        {!! html()->checkbox('enable_gst', '1', null)->class('form-check-input') !!}
        {!! html()->label('enable_gst', 'Enable Gst')->class('form-check-label') !!}
    </div>
</div>

<!-- Gstin Field -->
<div class="form-group mb-3 col-sm-6">
            {!! html()->label('Gstin')->for('gstin') !!}
            {!! html()->text('gstin', null)->class('form-control') !!}
</div>

<!-- Default Bill Due In Field -->
<div class="form-group mb-3 col-sm-6">
            {!! html()->label('Default Bill Due In')->for('default_bill_due_in') !!}
        {!! html()->number('default_bill_due_in', null)->class('form-control') !!}
</div>

<!-- Default Terms Field -->
<div class="form-group mb-3 col-sm-12 col-lg-12">
            {!! html()->label('Default Terms')->for('default_terms') !!}
            {!! html()->textarea('default_terms', null)->class('form-control') !!}
</div>

<!-- Enable Shipping Field -->
<div class="form-group mb-3 col-sm-6">
    <div class="form-check">
        {!! html()->hidden('enable_shipping', 0) !!}
        {!! html()->checkbox('enable_shipping', '1', null)->class('form-check-input') !!}
        {!! html()->label('enable_shipping', 'Enable Shipping')->class('form-check-label') !!}
    </div>
</div>

<!-- Currency Code Field -->
<div class="form-group mb-3 col-sm-6">
            {!! html()->label('Currency Code')->for('currency_code') !!}
            {!! html()->select('currency_code', [], null)->class('form-control custom-select') !!}
</div>

<!-- Country Code Field -->
<div class="form-group mb-3 col-sm-6">
            {!! html()->label('Country Code')->for('country_code') !!}
            {!! html()->select('country_code', [], null)->class('form-control custom-select') !!}
</div>

<!-- Submit Field -->
<div class="mt-3 col-md-12 fields_footer_action_buttons">
    <button class="btn btn-lg btn-success rspSuccessBtns me-2" type="submit" ><i class='tf-icons bx bx-save action_btn me-1'></i> SAVE</button>
    <a href="{{ route('admin.user-profiles.index') }}" class="btn btn-lg btn-outline-danger"><i class='bx bx-arrow-to-left action_btn me-1' ></i> BACK</a>
</div>
@push('stackedScripts')
    <script src="{{ asset('js/regAnother.js') }}"></script>

    <script>

        $('.submitsByAjax').submit(function (e) {
            e.preventDefault();
            let type = ''
            let dataToPass = new FormData($(this)[0]);
            ajaxCallFormSubmit($(this), false, 'Loading! Please wait...', dataToPass,
                type === 'create' ? postCreate : undefined);
        });

        function postCreate(){
            switch_between_register_to_registerAnother_btn($('.submitsByAjax'), false)
        }
    </script>
@endpush
