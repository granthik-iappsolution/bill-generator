<div class="d-flex justify-content-center mb-5">
    <!-- Name Field -->
    <div class="form-floating me-3">
        {!! html()->text('name', null)->class('form-control')->placeholder('Staff') !!}
        {!! html()->label('NAME OF THE ROLE', 'name') !!}
    </div>

    <!-- Submit Field -->
    <div class="fields_footer_action_buttons">
        <button class="btn btn-lg btn-success rspSuccessBtns me-2" type="submit" ><i class='tf-icons bx bx-save action_btn me-1'></i> CREATE</button>
    </div>
</div>

@push('stackedScripts')
    <script>
        $('.submitsByAjax').submit(function (e) {
            e.preventDefault();
            let type = '{{ $type ?? '' }}'
            let dataToPass = new FormData($(this)[0]);
            ajaxCallFormSubmit($(this), true, 'Loading! Please wait...', dataToPass, postCreate, $('#createRole'));
        });

        function postCreate(){
            LaravelDataTables['role-index'].ajax.reload(null, false);
        }
    </script>
@endpush
