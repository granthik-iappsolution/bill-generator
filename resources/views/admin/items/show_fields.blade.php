<!-- Id Field -->
<div class="col-sm-12">
            {!! html()->label('Id')->for('id') !!}
        <p>{{ $item->id }}</p>
</div>


<!-- Name Field -->
<div class="col-sm-12">
            {!! html()->label('Name')->for('name') !!}
        <p>{{ $item->name }}</p>
</div>


<!-- Description Field -->
<div class="col-sm-12">
            {!! html()->label('Description')->for('description') !!}
        <p>{{ $item->description }}</p>
</div>


<!-- Sold Qty Field -->
<div class="col-sm-12">
            {!! html()->label('Sold Qty')->for('sold_qty') !!}
        <p>{{ $item->sold_qty }}</p>
</div>


<!-- Rate Field -->
<div class="col-sm-12">
            {!! html()->label('Rate')->for('rate') !!}
        <p>{{ $item->rate }}</p>
</div>


<!-- Discount Field -->
<div class="col-sm-12">
            {!! html()->label('Discount')->for('discount') !!}
        <p>{{ $item->discount }}</p>
</div>


<!-- Uuid Field -->
<div class="col-sm-12">
            {!! html()->label('Uuid')->for('uuid') !!}
        <p>{{ $item->uuid }}</p>
</div>


<!-- Created At Field -->
<div class="col-sm-12">
            {!! html()->label('Created At')->for('created_at') !!}
        <p>{{ $item->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="col-sm-12">
            {!! html()->label('Updated At')->for('updated_at') !!}
        <p>{{ $item->updated_at }}</p>
</div>


