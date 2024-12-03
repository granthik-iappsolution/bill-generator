<?php

namespace App\DataTables\Admin;

use App\Models\Customer;
use Yajra\DataTables\Services\DataTable;
use App\MyClasses\DataTableHelpers;
use Yajra\DataTables\EloquentDataTable;
use App\MyClasses\DateHelpers;

class CustomerDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
            ->editColumn('created_by', function (Customer $customer){
                return $customer->createdBy->name ?? 'NA';
            })
            ->editColumn('updated_by', function (Customer $customer){
                return $customer->updatedBy->name ?? 'NA';
            })
            ->editColumn('created_at', function (Customer $customer){
                return DateHelpers::prepareHtmlDate($customer->created_at);
            })
            ->editColumn('updated_at', function (Customer $customer){
                return DateHelpers::prepareHtmlDate($customer->updated_at);
            })
            ->rawColumns(['created_at', 'updated_at', 'action'])
            ->addColumn('action', 'admin.customers.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Customer $customers
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Customer $customers)
    {
        return $customers->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters(DataTableHelpers::getParameters(count($this->getColumns()) -1));
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'name',
            'address',
            'pincode',
            'city',
            'state',
            'country',
            'mobile',
            'email',
            'created_by' => ['title' => 'Added by', 'visible' => false],
            'updated_by' => ['title' => 'Updated by', 'visible' => false],
            'created_at' => ['title' => 'Added on'],
            'updated_at' => ['title' => 'Updated on', 'visible' => false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'customers_datatable_' . time();
    }
}
