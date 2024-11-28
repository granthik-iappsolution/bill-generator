{!! $fields_data !!}

<!-- Submit Field -->
<div class="mt-3 col-md-12 fields_footer_action_buttons">
    <button class="btn btn-lg btn-success rspSuccessBtns me-2" type="submit" ><i class='tf-icons bx bx-save action_btn me-1'></i> SAVE</button>
    <a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.index') }}" class="btn btn-lg btn-outline-danger"><i class='bx bx-arrow-to-left action_btn me-1' ></i> BACK</a>
</div>
@@push('stackedScripts')
    <script src="{{ asset('js/regAnother.js') }}"></script>

    <script>

        @@if($type != 'show')
        uploadImageByDropzone('#user_avatar');
        @@endif

        $('.submitsByAjax').submit(function (e) {
            e.preventDefault();
            let type = '{{ $type ?? '' }}'
            let dataToPass = new FormData($(this)[0]);
            ajaxCallFormSubmit($(this), false, 'Loading! Please wait...', dataToPass,
                type === 'create' ? postCreate : undefined);
        });

        function postCreate(){
            switch_between_register_to_registerAnother_btn($('.submitsByAjax'), false)
        }
    </script>
@@endpush
