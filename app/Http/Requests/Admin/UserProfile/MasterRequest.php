<?php

namespace App\Http\Requests\Admin\UserProfile;

use App\Http\Requests\BaseRequest;
use App\Models\UserProfile;
use App\Repositories\Admin\UserProfileRepository;

class MasterRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return UserProfile::$rules;
    }

    /**
     * Handle an incoming request.
     */
    public function prepareForValidation() {
        $this->merge(UserProfileRepository::requestHandler($this));
    }
}
