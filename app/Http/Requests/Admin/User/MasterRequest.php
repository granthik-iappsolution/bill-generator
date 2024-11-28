<?php

namespace App\Http\Requests\Admin\User;

use App\Http\Requests\BaseRequest;
use App\Models\User;
use App\Repositories\Admin\UserRepository;

class MasterRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return User::$rules;
    }

    /**
     * Handle an incoming request.
     */
    public function prepareForValidation() {
        $this->merge(UserRepository::requestHandler($this));
    }
}
