<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CustomerDataTable;
use App\Http\Requests\Admin\Customer\CreateRequest;
use App\Http\Requests\Admin\Customer\UpdateRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Admin\CustomerRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use App\MyClasses\GeneralHelperFunctions;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Response;

class CustomerController extends AppBaseController
{
    /** @var CustomerRepository $customerRepository*/
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepo)
    {
        $this->customerRepository = $customerRepo;
    }

    /**
     * Display a listing of the Customer.
     *
     * @param CustomerDataTable $customerDataTable
     * @return Response
     */
    public function index(CustomerDataTable $customerDataTable) {
        return $customerDataTable->render('admin.customers.index');
    }


    /**
     * Show the form for creating a new Customer.
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|void
     */
    public function create() {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created Customer in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function store(CreateRequest $request) {
        DB::beginTransaction();
        $customer = Customer::create($request->validated());
        DB::commit();

        return Response::json(['message' => 'Customer has been created successfully.'
            . GeneralHelperFunctions::getSuccessResponseBtn($customer, route('admin.customers.edit', $customer))]);
    }

    /**
     * Display the specified Customer.
     *
     * @param Customer $customer
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|void
     */
    public function show(Customer $customer) {
        return view('admin.customers.show')->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified Customer.
     *
     * @param Customer $customer
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|void
     */
    public function edit(Customer $customer) {
        return view('admin.customers.edit')->with('customer', $customer);
    }

    /**
     * Update the specified Customer in storage.
     *
     * @param Customer $customer
     * @param UpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function update(Customer $customer, UpdateRequest $request) {
        DB::beginTransaction();
        $customer->update($request->validated());
        DB::commit();

        return Response::json(['message' => 'Customer updated successfully.']);
    }

    /**
     * Remove the specified Customer from storage.
     *
     * @param Customer $customer
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Customer $customer) {
        $customer->delete();

        return Response::json(['message' => 'Customer deleted successfully']);
    }
}
