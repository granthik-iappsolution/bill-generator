@php
    echo "<?php".PHP_EOL;
@endphp

namespace {{ $config->namespaces->dataTables }};

use {{ $config->namespaces->model }}\{{ $config->modelNames->name }};
@if($config->options->localized)
use Yajra\DataTables\Html\Column;
@endif
use Yajra\DataTables\Services\DataTable;
use App\MyClasses\DataTableHelpers;
use Yajra\DataTables\EloquentDataTable;
use App\MyClasses\DateHelpers;

class {{ $config->modelNames->name }}DataTable extends DataTable
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
            ->editColumn('created_by', function ({{ $config->modelNames->name }} ${{ $config->modelNames->camel }}){
                return ${{ $config->modelNames->camel }}->createdBy->name ?? 'NA';
            })
            ->editColumn('updated_by', function ({{ $config->modelNames->name }} ${{ $config->modelNames->camel }}){
                return ${{ $config->modelNames->camel }}->updatedBy->name ?? 'NA';
            })
            ->editColumn('created_at', function ({{ $config->modelNames->name }} ${{ $config->modelNames->camel }}){
                return DateHelpers::prepareHtmlDate(${{ $config->modelNames->camel }}->created_at);
            })
            ->editColumn('updated_at', function ({{ $config->modelNames->name }} ${{ $config->modelNames->camel }}){
                return DateHelpers::prepareHtmlDate(${{ $config->modelNames->camel }}->updated_at);
            })
            ->rawColumns(['created_at', 'updated_at', 'action'])
            ->addColumn('action', '{{ $config->prefixes->getViewPrefixForInclude() }}{{ $config->modelNames->snakePlural }}.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\{{ $config->modelNames->name }} ${{ $config->modelNames->snakePlural }}
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query({{ $config->modelNames->name }} ${{ $config->modelNames->snakePlural }})
    {
        return ${{ $config->modelNames->snakePlural }}->newQuery();
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
            {!! $columns !!},
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
        return '{{ $config->modelNames->snakePlural }}_datatable_' . time();
    }
}
