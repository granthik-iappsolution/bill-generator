<?php

namespace App\Http\Requests\Admin\Item;

use App\Http\Requests\BaseRequest;
use App\Models\Item;
use App\Repositories\Admin\ItemRepository;

class MasterRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return Item::$rules;
    }

    /**
     * Handle an incoming request.
     */
    public function prepareForValidation() {
        $this->merge(ItemRepository::requestHandler($this));
    }
}
