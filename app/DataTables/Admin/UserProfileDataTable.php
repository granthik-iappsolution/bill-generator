<?php

namespace App\DataTables\Admin;

use App\Models\UserProfile;
use Yajra\DataTables\Services\DataTable;
use App\MyClasses\DataTableHelpers;
use Yajra\DataTables\EloquentDataTable;
use App\MyClasses\DateHelpers;

class UserProfileDataTable extends DataTable
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
            ->editColumn('user_id', function (UserProfile $userProfile){
                return $userProfile->user->name ?? 'NA';
            })
            ->editColumn('created_by', function (UserProfile $userProfile){
                return $userProfile->createdBy->name ?? 'NA';
            })
            ->editColumn('updated_by', function (UserProfile $userProfile){
                return $userProfile->updatedBy->name ?? 'NA';
            })
            ->editColumn('created_at', function (UserProfile $userProfile){
                return DateHelpers::prepareHtmlDate($userProfile->created_at);
            })
            ->editColumn('updated_at', function (UserProfile $userProfile){
                return DateHelpers::prepareHtmlDate($userProfile->updated_at);
            })
            ->rawColumns(['created_at', 'updated_at', 'action'])
            ->addColumn('action', 'admin.user_profiles.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UserProfile $user_profiles
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UserProfile $user_profiles)
    {
        return $user_profiles->newQuery();
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
            'user_id' => ['title' => 'User', 'visible' => false],
            'name',
            'address',
            'city',
            'state',
            'country',
            'email',
            'mobile',
            'website',
            'is_company' => ['visible' => false],
            'logo' => ['visible' => false],
            'sign' => ['visible' => false],
            'upi_code' => ['visible' => false],
            'default_template_id'  => ['title' => 'Default Template', 'visible' => false],
            'enable_gst' => ['visible' => false],
            'gstin' => ['visible' => false],
            'default_bill_due_in',
            'default_terms' => ['visible' => false],
            'enable_shipping' => ['visible' => false],
            'currency_code' => ['visible' => false],
            'country_code' => ['visible' => false],
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
        return 'user_profiles_datatable_' . time();
    }
}
