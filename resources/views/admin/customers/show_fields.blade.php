<!-- Id Field -->
<div class="col-sm-12">
            {!! html()->label('Id')->for('id') !!}
        <p>{{ $customer->id }}</p>
</div>


<!-- Name Field -->
<div class="col-sm-12">
            {!! html()->label('Name')->for('name') !!}
        <p>{{ $customer->name }}</p>
</div>


<!-- Address Field -->
<div class="col-sm-12">
            {!! html()->label('Address')->for('address') !!}
        <p>{{ $customer->address }}</p>
</div>


<!-- Pincode Field -->
<div class="col-sm-12">
            {!! html()->label('Pincode')->for('pincode') !!}
        <p>{{ $customer->pincode }}</p>
</div>


<!-- City Field -->
<div class="col-sm-12">
            {!! html()->label('City')->for('city') !!}
        <p>{{ $customer->city }}</p>
</div>


<!-- State Field -->
<div class="col-sm-12">
            {!! html()->label('State')->for('state') !!}
        <p>{{ $customer->state }}</p>
</div>


<!-- Country Field -->
<div class="col-sm-12">
            {!! html()->label('Country')->for('country') !!}
        <p>{{ $customer->country }}</p>
</div>


<!-- Mobile Field -->
<div class="col-sm-12">
            {!! html()->label('Mobile')->for('mobile') !!}
        <p>{{ $customer->mobile }}</p>
</div>


<!-- Email Field -->
<div class="col-sm-12">
            {!! html()->label('Email')->for('email') !!}
        <p>{{ $customer->email }}</p>
</div>


<!-- Uuid Field -->
<div class="col-sm-12">
            {!! html()->label('Uuid')->for('uuid') !!}
        <p>{{ $customer->uuid }}</p>
</div>


<!-- Created At Field -->
<div class="col-sm-12">
            {!! html()->label('Created At')->for('created_at') !!}
        <p>{{ $customer->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="col-sm-12">
            {!! html()->label('Updated At')->for('updated_at') !!}
        <p>{{ $customer->updated_at }}</p>
</div>


