@section('vendor-style')
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
@endsection

@section('vendor-script')
    <script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
@endsection

<div class="col-12">
    <div class="bs-stepper wizard-vertical vertical user_profile_form mt-2 ">
        <div class="bs-stepper-header">
            <div class="step" data-target="#user_profile_meta" data-step="1">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle"><i class="bx bx-bulb"></i></span>
                    <span class="bs-stepper-label mt-1">
                        <span class="bs-stepper-title">Basic Information</span>
                        <span class="bs-stepper-subtitle">The Basic User Profile Info.</span>
                    </span>
                </button>
            </div>
            <div class="line"></div>

            <div class="step" data-target="#user_profile_pictures" data-step="2">
                <button type="button" class="step-trigger patientTherapistFormTab">
                    <span class="bs-stepper-circle"><i class='bx bx-image-add' ></i></span>
                    <span class="bs-stepper-label mt-1">
                        <span class="bs-stepper-title">Logo, Sign & Upi Code</span>
                        <span class="bs-stepper-subtitle">Upload Logo, Sign & Upi Code.</span>
                    </span>
                </button>
            </div>
            <div class="line"></div>

            <div class="step" data-target="#user_profile_additional_info" data-step="3">
                <button type="button" class="step-trigger patientTherapistReportFormTab">
                    <span class="bs-stepper-circle"><i class='bx bx-detail' ></i></span>
                    <span class="bs-stepper-label mt-1">
                        <span class="bs-stepper-title">Additional Information</span>
                        <span class="bs-stepper-subtitle">The Additional Information Details.</span>
                    </span>
                </button>
            </div>
            <div class="line"></div>
        </div>

        <div class="bs-stepper-content" style="overflow-y: auto;">
            <div id="user_profile_meta" class="content">
                <div class="content-header mb-3">
                    <h4 class="mb-0">Basic Information</h4>
                    <small>This section provides essential information about the session.</small>
                </div>
                <div class="row">
                    @include('admin.user_profiles.fields.basicInfo')
                </div>

                <div class="col-12 d-flex justify-content-between">
                    <button disabled type="button" class="btn btn-outline-primary btn-prev">
                        <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                    </button>
                    <div>
                        <button type="button" class="btn btn-outline-primary btn-next">
                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                            <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                        </button>
                    </div>
                </div>

            </div>

            <div id="user_profile_pictures" class="content">
                <div class="content-header mb-3">
                    <div class="w-100 d-flex justify-content-between ">
                        <div class="d-flex align-items-left flex-column">
                            <h4 class="mb-0">Logo, Sign & Upi Code</h4>
                            <small>Here, you can upload logo, sign & upi code's pictures.</small>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    @include('admin.user_profiles.fields.pictures')

                </div>
                <div class="col-12 d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-primary btn-prev">
                        <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                    </button>
                    <div>
                        <button type="button" class="btn btn-outline-primary btn-next">
                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                            <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div id="user_profile_additional_info" class="content">
                <div class="content-header mb-3">
                    <div class="w-100 d-flex justify-content-between ">
                        <div class="d-flex align-items-left flex-column">
                            <h4 class="mb-0">Additional Information</h4>
                            <small>This section outlines the additional information.</small>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @include('admin.user_profiles.fields.additionalInfo')

                </div>

                <div class="col-12 d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-primary btn-prev">
                        <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                    </button>
                    <div>
                        <button class="btn btn-success rspSuccessBtns me-2" type="submit" ><i class='tf-icons bx bx-save action_btn me-1'></i> SAVE</button>
                        <a href="{{ route('admin.user-profiles.index') }}" class="btn btn-outline-danger"><i class='bx bx-arrow-to-left action_btn me-1' ></i> BACK</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@push('stackedScripts')

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script>
        uploadImageByDropzone('#logo');
        uploadImageByDropzone('#sign');
        uploadImageByDropzone('#upi_code');
    </script>

    <script>
        const wizardIconsVertical = document.querySelector('.user_profile_form');
        const wizardIconsVerticalBtnSaveNextList = $('.btn-save-and-next'),
            wizardIconsVerticalBtnPrevList = [].slice.call(wizardIconsVertical.querySelectorAll('.btn-prev')),
            wizardIconsVerticalBtnNextList = [].slice.call(wizardIconsVertical.querySelectorAll('.btn-next'));
        const verticalIconsStepper = new Stepper(wizardIconsVertical, {
            linear: false
        });
        if (wizardIconsVerticalBtnSaveNextList.length > 0) {
            wizardIconsVerticalBtnSaveNextList.each(function(){
                let thisEleRef = $(this);
                thisEleRef.click(function(){
                    submitFormByAjax(thisEleRef.closest('form.submitsByAjax'), function(){
                        verticalIconsStepper.next();
                        let newNextStep = parseInt(getParameterByName('active_step', window.location.href) ?? 1) + 1;
                        window.history.replaceState({}, '','?active_step=' + newNextStep);
                    });
                })
            });
        }
        if (wizardIconsVerticalBtnPrevList) {
            wizardIconsVerticalBtnPrevList.forEach(wizardIconsVerticalBtnPrev => {
                wizardIconsVerticalBtnPrev.addEventListener('click', event => {
                    verticalIconsStepper.previous();
                    let newPrevStep = parseInt(getParameterByName('active_step', window.location.href)) - 1;
                    window.history.replaceState({}, '','?active_step=' + newPrevStep);
                });
            });
        }
        if (wizardIconsVerticalBtnNextList) {
            wizardIconsVerticalBtnNextList.forEach(wizardIconsVerticalBtnNext => {
                wizardIconsVerticalBtnNext.addEventListener('click', event => {
                    verticalIconsStepper.next();
                    let newPrevStep = parseInt(getParameterByName('active_step', window.location.href)) + 1;
                    window.history.replaceState({}, '','?active_step=' + newPrevStep);
                });
            });
        }

        let indexItem = $('.user_profile_form .step');
        indexItem.click(function(){
            window.history.replaceState({}, '','?active_step=' +$(this).data('step'));
        })

        let activeStep = getParameterByName('active_step', window.location.href);
        if(activeStep){
            verticalIconsStepper.to(activeStep);
        }
        if (activeStep == 2) {
            verticalIconsStepper.to(activeStep);
        }
        if (activeStep == 3) {
            verticalIconsStepper.to(activeStep);
        }
        if (activeStep == 4) {
            verticalIconsStepper.to(activeStep);
        }

        function submitFormByAjax(formRef, callback = undefined, toast = true){
            let dataToPass = new FormData(formRef[0]);
            ajaxCallFormSubmit(formRef, toast, 'Loading! Please wait...', dataToPass,callback);
            // window.location.href = "?active_step=2";
        }



        function loadPage() {
            let activeStep = getParameterByName('active_step', window.location.href);
            if(activeStep){
                verticalIconsStepper.to(activeStep);
            }
            if (activeStep == 2) {
                verticalIconsStepper.to(activeStep);
            }
            if (activeStep == 3) {
                verticalIconsStepper.to(activeStep);
            }
            if (activeStep == 4) {
                verticalIconsStepper.to(activeStep);
            }
        }




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

    @include('admin.layouts.templates.select2.user')
    {{-- @include('admin.layouts.templates.select2.patient') --}}

    <script>
        let usersRef = $('#user_id');

        initAjaxSelect2(usersRef, function (params) {
                return "{{ route('admin.users.search') }}";
            }, function (params) {
                return {pageNo: params.page || 1, noOfRecords: 10, term: params.term || ''};
            }, null, formatUserOptions, formatUserSelection, 'POST'
        );
    </script>

    <script>
        $(document).ready(function () {
            // Function to toggle visibility of GSTIN field
            function toggleGstinField() {
                if ($('#enable_gst').is(':checked')) {
                    $('#gstin_group').removeClass('d-none');
                } else {
                    $('#gstin_group').addClass('d-none');
                }
            }

            // Check on page load
            toggleGstinField();

            // Add event listener for change event
            $('#enable_gst').on('change', function () {
                toggleGstinField();
            });
        });
    </script>
@endpush
