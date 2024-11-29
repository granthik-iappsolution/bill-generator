{{-- @extends('layouts.layoutMaster')

@section('title')
    Create User Profile - Bill-Generator
@endsection

@section('page_headers')
    <h3><i class="fa-duotone fa-users mr-2"></i>User Profiles</h3>
@endsection

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item"><a href="{{ route('admin.user-profiles.index') }}">User Profiles</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Create User Profile</h4>
        </div>
        <div class="card-body">
            @include('adminlte-templates::common.errors')
            {!! html()->form('POST', route('admin.user-profiles.store'))
                ->acceptsFiles()
                ->class('submitsByAjax')
                ->open() !!}
            <div class="row">
                @include('admin.user_profiles.fields', ['type' => 'create'])
            </div>
            {!! html()->form()->close() !!}
        </div>
    </div>
@endsection --}}















@php
    $autocompletesId = 'addressInput';
@endphp
<div class="modal-onboarding modal fade animate__animated" id="createUserProfile" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content text-center">
            <div class="position-relative border-0">
                <button type="button" class="btn-close position-absolute modalBtn_cross" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body onboarding-horizontal p-0">
                <div class="onboarding-content">
                    <h3 class="onboarding-title text-body text-start">Add User Profile</h3>
                    <div class="onboarding-info text-start">Just specify the basic details of the user profile to get started.</div>
                    {!! html()->form('POST', route('admin.user-profiles.store'))
                        // ->class('submitsByAjax')
                        ->acceptsFiles()
                        ->open()
                    !!}
                        <div class="row">
                            @include('admin.user_profiles.fields.create_modal')
                        </div>
                    {!! html()->form()->close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@push('stackedScripts')
    <script src="{{ asset('js/regAnother.js') }}"></script>


    @include('admin.layouts.templates.select2.user')
    {{-- @include('admin.layouts.templates.select2.patient') --}}

    <script>
        let usersRef = $('#user_id');
        // let patientRef = $('#patient_id');

        initAjaxSelect2(usersRef, function (params) {
                return "{{ route('admin.users.search') }}";
            }, function (params) {
                return {pageNo: params.page || 1, noOfRecords: 10, term: params.term || ''};
            }, null, formatUserOptions, formatUserSelection, 'POST'
        );



    </script>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvw0ZqufReMkpx9YuvWLlEVv1oeslE4to&libraries=places&callback=initAutocomplete{{ $autocompletesId }}" async defer></script>

    <script>
        function initAutocomplete{{ $autocompletesId }}() {
            autocomplete{{ $autocompletesId }} = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('{{ $autocompletesId }}')),
                {types: ['geocode']});
            autocomplete{{ $autocompletesId }}.addListener('place_changed', fillInAddress{{ $autocompletesId }});
        }

        function fillInAddress{{ $autocompletesId }}() {
            var place = autocomplete{{ $autocompletesId }}.getPlace();

            var lat = place.geometry.location.lat(),
                lng = place.geometry.location.lng();
            $("#add_lat").val(lat);
            $("#add_lng").val(lng);
            var href = 'https://www.google.com/maps/?q=' + lat + ',' + lng;
            $('.mapLink').attr('href', href);
            for (var i = 0; i < place.address_components.length; i++) {
                for (var j = 0; j < place.address_components[i].types.length; j++) {
                    if (place.address_components[i].types[j] == "locality") {
                        var city = place.address_components[i].long_name;
                        $("#add_city").val(city);
                    }

                    // State (Administrative Area Level 1)
                    else if (place.address_components[i].types[j] == "administrative_area_level_1") {
                        var state = place.address_components[i].long_name;
                        $("#add_state").val(state);
                    }

                    else if (place.address_components[i].types[j] == "country") {
                        var country = place.address_components[i].long_name;
                        $("#add_country").val(country);
                    }
                }
            }
        }
    </script>

@endpush
