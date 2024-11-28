<div class="col-md-9">
    <div class="row">
        <div class="col-md-5 mb-3">
            {!! html()->label('Name:')->for('name')->class('form-label') !!}
            {!! html()->text('name', null)->class('form-control')->placeholder('John Doe') !!}
        </div>

        <!-- Roles Field -->
        <div class="mb-3 col-md-7">
            {!! html()->label('Role:')->for('role')->class('form-label') !!}

            {!! html()->multiselect('role[]', $roleItems)
                ->id('role')
                ->class('form-select select2-multiple')
                ->attribute('data-placeholder', 'Project Manager?') !!}

        </div>

        <!-- Email Field -->
        <div class="mb-3 col-md-6">
            {!! html()->label('Email:')->for('email')->class('form-label') !!}
            {!! html()->text('email', null)->class('form-control')->placeholder('john_doe@mellon.ca') !!}
        </div>

        <!-- Mobile Field -->
        <div class="mb-3 col-md-6">
            {!! html()->label('Mobile:')->for('mobile')->class('form-label') !!}
            <div class="input-group input-group-merge">
                <span class="input-group-text">+1</span>
                {!! html()->text('mobile', null)->class('form-control phone-number-mask')->placeholder('202 555 0111') !!}
            </div>
        </div>

        @if($type == 'create')
            <!-- Password Field -->
            <div class="mb-3 col-md-12">
                <div class="form-password-toggle">
                    {!! html()->label('Password:')->for('password')->class('form-label') !!}
                    <div class="input-group input-group-merge">
                        {!! html()->password('password')->class('form-control')->placeholder('············') !!}
                        <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@php $hasAvatar = !empty($user) ? $user->hasMedia('avatar') : false @endphp
@include('admin.layouts.scripts.dzSingleImageField', [
    'record' => isset($user) ? $user : '',
    'hasMedia' => $hasAvatar,
    'previewUrl' => $hasAvatar ? $user->avatarUrl['250'] : route('images_default',['resolution' => '250x250']),
    'mediaUuid' => $hasAvatar ? $user->getFirstMedia('avatar')->uuid ?? '' : '',
    'fieldName' => 'avatar',
    'elementId' => 'user_avatar',
    'placeHolderText' => "Drop/Select User Avatar<br/>(Max: 1 MB)"
])
@php
    $activity = isset($user) ? ($user->status == 1) : false;
@endphp

<div class="mb-3 col-md-12">
    <label for="activity_toggle" class="form-label">Status:</label>
    <div class="form-check form-switch">
        <input type="hidden" name="status" value="0">
        <input class="form-check-input" type="checkbox" id="activity_toggle" name="status" value="1" {{ $activity ? 'checked' : '' }}>
        <label class="form-check-label" for="activity_toggle">
            {{ $activity ? 'Active' : 'Inactive' }}
        </label>
    </div>
</div>

<!-- Submit Field -->
<div class="mt-3 col-md-12 fields_footer_action_buttons">
    <button class="btn btn-lg btn-success rspSuccessBtns me-2" type="submit" ><i class='tf-icons bx bx-save action_btn me-1'></i> SAVE</button>
    <a href="{{ route('admin.users.index') }}" class="btn btn-lg btn-outline-danger"><i class='bx bx-arrow-to-left action_btn me-1' ></i> BACK</a>
</div>

@push('stackedScripts')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="{{ asset('js/regAnother.js') }}"></script>

    <script>
        Dropzone.autoDiscover = false;

        @if($type != 'show')
        uploadImageByDropzone('#user_avatar');
        @endif

        $('.submitsByAjax').submit(function (e) {
            e.preventDefault();
            let type = '{{ $type ?? '' }}'
            let dataToPass = new FormData($(this)[0]);
            ajaxCallFormSubmit($(this), false, 'Loading! Please wait...', dataToPass,
                type === 'create' ? postCreate : undefined, $(this));
        });

        function postCreate(){
            switch_between_register_to_registerAnother_btn($('.submitsByAjax'), false)
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#activity_toggle').change(function() {
                var label = $(this).next('label');
                if ($(this).is(':checked')) {
                    label.text('Active');
                } else {
                    label.text('Inactive');
                }
            });
        });
    </script>
@endpush
