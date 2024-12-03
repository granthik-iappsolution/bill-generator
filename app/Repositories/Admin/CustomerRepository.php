<?php

namespace App\Repositories\Admin;

use App\Models\Customer;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class CustomerRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'address',
        'pincode',
        'city',
        'state',
        'country',
        'mobile',
        'email'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Customer::class;
    }

    /**
     * request handler for store and update
     * @param Request $request
     * @return array
     */
    public static function requestHandler(Request $request) {
        return [];
    }
}
