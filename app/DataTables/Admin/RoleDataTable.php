<?php

namespace App\DataTables\Admin;

use App\Models\Role;
use App\MyClasses\DataTableHelpers;
use App\MyClasses\DateHelpers;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class RoleDataTable extends DataTable
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
            ->editColumn('created_by', function (Role $role){
                return $role->createdBy->name ?? 'NA';
            })
            ->editColumn('updated_by', function (Role $role){
                return $role->updatedBy->name ?? 'NA';
            })
            ->editColumn('created_at', function (Role $model){
                return DateHelpers::prepareHtmlDate($model->created_at);
            })
            ->editColumn('updated_at', function (Role $model){
                return DateHelpers::prepareHtmlDate($model->updated_at);
            })
            ->addColumn('action', function (Role $role) {
                return View('admin.roles.datatables_actions', ['role' => $role])->render();
            })
//            ->addColumn('action', 'admin.roles.datatables_actions')
            ->rawColumns(['created_at', 'updated_at', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Role $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Role $model)
    {
        return $model->newQuery()->where('name', '<>', 'Super Admin')->where('guard_name', 'web');
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
    protected function filename() : string
    {
        return 'rolesdatatable_' . time();
    }
}
