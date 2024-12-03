<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ItemDataTable;
use App\Http\Requests\Admin\Item\CreateRequest;
use App\Http\Requests\Admin\Item\UpdateRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Admin\ItemRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use App\MyClasses\GeneralHelperFunctions;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Response;

class ItemController extends AppBaseController
{
    /** @var ItemRepository $itemRepository*/
    private $itemRepository;

    public function __construct(ItemRepository $itemRepo)
    {
        $this->itemRepository = $itemRepo;
    }

    /**
     * Display a listing of the Item.
     *
     * @param ItemDataTable $itemDataTable
     * @return Response
     */
    public function index(ItemDataTable $itemDataTable) {
        return $itemDataTable->render('admin.items.index');
    }


    /**
     * Show the form for creating a new Item.
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|void
     */
    public function create() {
        return view('admin.items.create');
    }

    /**
     * Store a newly created Item in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function store(CreateRequest $request) {
        DB::beginTransaction();
        $item = Item::create($request->validated());
        DB::commit();

        return Response::json(['message' => 'Item has been created successfully.'
            . GeneralHelperFunctions::getSuccessResponseBtn($item, route('admin.items.edit', $item))]);
    }

    /**
     * Display the specified Item.
     *
     * @param Item $item
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|void
     */
    public function show(Item $item) {
        return view('admin.items.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified Item.
     *
     * @param Item $item
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|void
     */
    public function edit(Item $item) {
        return view('admin.items.edit')->with('item', $item);
    }

    /**
     * Update the specified Item in storage.
     *
     * @param Item $item
     * @param UpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function update(Item $item, UpdateRequest $request) {
        DB::beginTransaction();
        $item->update($request->validated());
        DB::commit();

        return Response::json(['message' => 'Item updated successfully.']);
    }

    /**
     * Remove the specified Item from storage.
     *
     * @param Item $item
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Item $item) {
        $item->delete();

        return Response::json(['message' => 'Item deleted successfully']);
    }
}
