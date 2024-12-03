<?php

namespace App\Repositories\Admin;

use App\Models\Item;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class ItemRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'description',
        'sold_qty',
        'rate',
        'discount'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Item::class;
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
