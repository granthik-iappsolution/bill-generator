<?php

namespace App\DataTables\Admin;

use App\Models\User;
use App\MyClasses\DataTableHelpers;
use App\MyClasses\DateHelpers;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UserDataTable extends DataTable
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
            ->addColumn('name_avatar', function (User $user) {
                $avatar = "<span class='text-center'><img src='{$user?->avatarUrl['100']}' alt=\"{$user?->name}'s Message\" width='30' style='border-radius: 50px' /></span>";
                $name = "<span> {$user?->name} </span>";
                return $avatar . $name;
            })
            ->addColumn('roles', function (User $user) {
                return implode(', ', $user->getRoleNames()->toArray());
            })
            ->editColumn('status', function (User $user) {
                $checked = $user->status == 1 ? 'checked' : '';
                return "<label class='toggle'>
                <input type='checkbox' name='status' value='{$user->uuid}' data-user-id='{$user->uuid}' {$checked} onchange='updateStatus($(this))' />
                <span class='toggle-slider round'></span>
            </label>";
            })
            ->editColumn('created_by', function (User $user){
                return $user->createdBy->name ?? 'NA';
            })
            ->editColumn('updated_by', function (User $user){
                return $user->updatedBy->name ?? 'NA';
            })
            ->editColumn('created_at', function (User $user) {
                return DateHelpers::prepareHtmlDate($user->created_at);
            })
            ->editColumn('updated_at', function (User $user) {
                return DateHelpers::prepareHtmlDate($user->updated_at);
            })
            ->addColumn('action', 'admin.users.datatables_actions')
            ->rawColumns(['name_avatar', 'status', 'action', 'created_at', 'updated_at']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery();
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
            ->addAction(['width' => '120px', 'printable' => false, 'className' => 'text-end'])
            ->parameters(DataTableHelpers::getParameters(count($this->getColumns()) - 1));
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'name_avatar' => ['title' => 'Avatar and Name'],
            'email',
            'mobile',
            'roles',
            'status' => ['title' => 'Status', 'orderable' => false, 'searchable' => false],
            'created_by' => ['title' => 'Added by', 'visible' => true],
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
        return 'usersdatatable_' . time();
    }
}
