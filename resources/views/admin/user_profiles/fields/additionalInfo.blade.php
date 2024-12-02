<!-- Default Template Id Field -->
<div class="form-group mb-3 col-sm-3">
    {!! html()->label('Default Template Id')->for('default_template_id') !!}
    {!! html()->select('default_template_id', [], null)->class('form-control custom-select') !!}
</div>

<!-- Default Bill Due In Field -->
<div class="form-group mb-3 col-sm-3">
    {!! html()->label('Default Bill Due In')->for('default_bill_due_in') !!}
    {!! html()->number('default_bill_due_in', null)->class('form-control') !!}
</div>

<!-- Currency Code Field -->
<div class="form-group mb-3 col-sm-3">
    {!! html()->label('Currency Code')->for('currency_code') !!}
    {!! html()->select('currency_code', $currencyCode, null)->class('form-control custom-select select2_with_placeholder')->id('currency_code') !!}
</div>

<!-- Country Code Field -->
<div class="form-group mb-3 col-sm-3">
    {!! html()->label('Country Code')->for('country_code') !!}
    {!! html()->select('country_code', $countryCode, null)->class('form-control custom-select select2_with_placeholder')->id('country_code') !!}
</div>


<!-- Is Company Field -->
<div class="form-group mb-3 col-sm-2">
    <div class="form-check">
        {!! html()->checkbox('is_company', null, 1)->class('form-check-input') !!}
        {!! html()->label('is_company', 'Is Company')->class('form-check-label') !!}
    </div>
</div>

<!-- Enable Shipping Field -->
<div class="form-group mb-3 col-sm-2">
    <div class="form-check">
        {!! html()->checkbox('enable_shipping', null, 1)->class('form-check-input') !!}
        {!! html()->label('enable_shipping', 'Enable Shipping')->class('form-check-label') !!}
    </div>
</div>

<!-- Enable Gst Field -->
<div class="form-group mb-3 col-sm-2">
    <div class="form-check">
        {!! html()->checkbox('enable_gst', null, 1)->class('form-check-input')->id('enable_gst') !!}
        {!! html()->label('enable_gst', 'Enable Gst')->class('form-check-label') !!}
    </div>
</div>

<!-- Gstin Field -->
<div class="form-group mb-3 col-sm-6 d-none" id="gstin_group">
            {!! html()->label('Gstin')->for('gstin') !!}
            {!! html()->text('gstin', null)->class('form-control') !!}
</div>



<!-- Default Terms Field -->
<div class="form-group mb-3 col-sm-12 col-lg-12">
            {!! html()->label('Default Terms')->for('default_terms') !!}
            {!! html()->textarea('default_terms', null)->class('form-control') !!}
</div>


