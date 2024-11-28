
<div class="modal-onboarding modal fade animate__animated" id="createRole" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="onboarding-media">
                    <div class="mx-2">
                        <img src="{{asset('assets/img/illustrations/girl-unlock-password-'.$configData['style'].'.png')}}" alt="girl-unlock-password-light" width="335" class="img-fluid" data-app-dark-img="illustrations/girl-unlock-password-dark.png" data-app-light-img="illustrations/girl-unlock-password-light.png">
                    </div>
                </div>
                <div class="onboarding-content mb-0">
                    <h4 class="onboarding-title text-body">Create Role</h4>
                    <div class="onboarding-info">Just put up the new name of the role.</div>
                    {!! html()->form('POST', route('admin.roles.store'))
                        ->attribute('enctype', 'multipart/form-data')
                        ->class('submitsByAjax')
                        ->open() !!}
                        @include('admin.roles.fields', ['type' => 'create'])
                    {!! html()->closeModelForm() !!}
                </div>
            </div>
        </div>
    </div>
</div>
