@php $hasLogo = !empty($userProfile) ? $userProfile->hasMedia('logo') : false @endphp
@include('admin.layouts.scripts.dzSingleImageField', [
    'record' => isset($userProfile) ? $userProfile : '',
    'hasMedia' => $hasLogo,
    'previewUrl' => $hasLogo ? $userProfile->logoUrl['250'] : route('images_default',['resolution' => '250x250']),
    'mediaUuid' => $hasLogo ? $userProfile->getFirstMedia('logo')->uuid ?? '' : '',
    'fieldName' => 'logo',
    'elementId' => 'logo',
    'placeHolderText' => "Drop/Select Patient Avatar<br/>(Max: 1 MB)"
])


@php $hasSign = !empty($userProfile) ? $userProfile->hasMedia('sign') : false @endphp
@include('admin.layouts.scripts.dzSingleImageField', [
    'record' => isset($userProfile) ? $userProfile : '',
    'hasMedia' => $hasSign,
    'previewUrl' => $hasSign ? $userProfile->signUrl['250'] : route('images_default',['resolution' => '250x250']),
    'mediaUuid' => $hasSign ? $userProfile->getFirstMedia('sign')->uuid ?? '' : '',
    'fieldName' => 'sign',
    'elementId' => 'sign',
    'placeHolderText' => "Drop/Select Patient Avatar<br/>(Max: 1 MB)"
])


@php $hasUpiCode = !empty($userProfile) ? $userProfile->hasMedia('upi_code') : false @endphp
@include('admin.layouts.scripts.dzSingleImageField', [
    'record' => isset($userProfile) ? $userProfile : '',
    'hasMedia' => $hasUpiCode,
    'previewUrl' => $hasUpiCode ? $userProfile->upiCodeUrl['250'] : route('images_default',['resolution' => '250x250']),
    'mediaUuid' => $hasUpiCode ? $userProfile->getFirstMedia('upi_code')->uuid ?? '' : '',
    'fieldName' => 'upi_code',
    'elementId' => 'upi_code',
    'placeHolderText' => "Drop/Select Patient Avatar<br/>(Max: 1 MB)"
])
