<!-- User Id Field -->
<div class="form-group mb-3 col-sm-4">
    {!! html()->label('User')->for('user_id') !!}
    {!! html()->select('user_id', [], null)
        ->class('form-control custom-select select2_with_placeholder')
        ->id('user_id')
    !!}
</div>

<!-- Name Field -->
<div class="form-group mb-3 col-sm-4">
    {!! html()->label('Name')->for('name') !!}
    {!! html()->text('name', null)->class('form-control') !!}
</div>

<!-- Email Field -->
<div class="form-group mb-3 col-sm-4">
{!! html()->label('Email')->for('email') !!}
{!! html()->text('email', null)->class('form-control') !!}
</div>

<!-- Mobile Field -->
<div class="form-group mb-3 col-sm-4">
{!! html()->label('Mobile')->for('mobile') !!}
{!! html()->number('mobile', null)->class('form-control') !!}
</div>

<!-- Website Field -->
<div class="form-group mb-3 col-sm-4">
    {!! html()->label('Website')->for('website') !!}
    {!! html()->text('website', null)->class('form-control') !!}
</div>

<!-- Address Field -->
<div class="form-group mb-3 col-sm-4">
    {!! html()->label('Address')->for('address') !!}
    {!! html()->text('address', null)->class('form-control')->id('addressInput') !!}
</div>

<!-- City Field -->
<div class="form-group mb-3 col-sm-4">
{!! html()->label('City')->for('city') !!}
{!! html()->text('city', null)->class('form-control') !!}
</div>

<!-- State Field -->
<div class="form-group mb-3 col-sm-4">
{!! html()->label('State')->for('state') !!}
{!! html()->text('state', null)->class('form-control') !!}
</div>

<!-- Country Field -->
<div class="form-group mb-3 col-sm-4">
{!! html()->label('Country')->for('country') !!}
{!! html()->text('country', null)->class('form-control') !!}
</div>

{{-- {!! html()->hidden('address_lat', null)->class('form-control')->id('add_lat') !!}
{!! html()->hidden('address_lon', null)->class('form-control')->id('add_lng') !!} --}}
