<?php

namespace App\Http\Requests\Admin\User;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\Admin\UserRepository;
use Symfony\Component\HttpFoundation\ParameterBag;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UpdateProfilePasswordRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'existing_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('The existing password is incorrect.');
                    }
                },
            ],
            'new_password' => 'required|string',
            'confirm_password' => 'required|same:new_password',
        ];

        return $rules;
    }
}
