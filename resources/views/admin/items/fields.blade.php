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


<!-- Submit Field -->
<div class="mt-3 col-md-12 fields_footer_action_buttons">
    <button class="btn btn-lg btn-success rspSuccessBtns me-2" type="submit" ><i class='tf-icons bx bx-save action_btn me-1'></i> SAVE</button>
    <a href="{{ route('admin.items.index') }}" class="btn btn-lg btn-outline-danger"><i class='bx bx-arrow-to-left action_btn me-1' ></i> BACK</a>
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
