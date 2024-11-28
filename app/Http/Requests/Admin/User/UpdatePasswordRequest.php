<?php

namespace App\Http\Requests\Admin\User;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\Admin\UserRepository;

class UpdatePasswordRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules['new_password'] = 'required';
        $rules['confirm_password'] = 'required|same:new_password';

        return $rules;
    }

    /**
     * Handle an incoming request.
     */
    public function prepareForValidation()
    {
        $this->merge(UserRepository::requestHandler($this));
    }

}
