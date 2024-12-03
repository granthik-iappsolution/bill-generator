<?php

namespace App\Http\Requests\Admin\Customer;

use App\Http\Requests\BaseRequest;
use App\Models\Customer;
use App\Repositories\Admin\CustomerRepository;

class MasterRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return Customer::$rules;
    }

    /**
     * Handle an incoming request.
     */
    public function prepareForValidation() {
        $this->merge(CustomerRepository::requestHandler($this));
    }
}
