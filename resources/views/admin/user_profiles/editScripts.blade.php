
<script>
    @php
        $user = \App\Models\User::find(old('user_id')) ?? \App\Models\User::where('id', $userProfile->user_id)->first() ?? null;
    @endphp

    @if(isset($user))
        fillSelect2($('#user_id'), @json(\App\Http\Controllers\Admin\UserController::getResultsArr_forGeneralUse($user->uuid)));
    @endif

    $('#currency_code').val('{{ old('currency_code') ?? $userProfile->currency_code ?? null }}').trigger('change');
    $('#country_code').val('{{ old('country_code') ?? $userProfile->country_code ?? null }}').trigger('change');

</script>
