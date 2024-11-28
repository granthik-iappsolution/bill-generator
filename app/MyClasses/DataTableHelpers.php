<?php

namespace App\MyClasses;

class DataTableHelpers {

    /**
     * Gets Standard Datatable parameters
     * @return array
     */
    public static function getParameters($orderIndex = 0) {
        return [
            'responsive'=> true,
            'sDom'       => self::getDomString(),
            'stateSave' => true,
            'language' => [
                'sLengthMenu' => '_MENU_',
                'search' => '',
                'searchPlaceholder' => 'Search...',
            ],
            'order'     => [[$orderIndex , 'desc']],
            'buttons'   => [
//                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                ['extend' => 'copy', 'titleAttr'=> 'Copy', 'className' => 'btn btn-outline-secondary', 'text' => "<i class='bx bx-copy-alt' ></i>"],
                ['extend' => 'reset', 'titleAttr'=> 'Reset', 'className' => 'btn btn-outline-secondary  ms-3', 'text' => "<i class='bx bx-reset' ></i>"],
                ['extend' => 'reload', 'titleAttr'=> 'Reload', 'className' => 'btn btn-outline-secondary', 'text' => "<i class='bx bx-refresh' ></i>"],
                ['extend' => 'colvis', 'titleAttr'=> 'Columns', 'className' => 'btn btn-outline-secondary', 'text' => "<i class='bx bx-list-ul' ></i>"]
            ],
        ];
    }

    /**
     * Returns the DOM string for the DT
     * @return string
     */
    public static function getDomString() {
        return '<"row mx-2"' . '<"col-md-2"<"me-3"l>>'
            . '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>'
            . '><"table-responsive"rt>' . '<"row mx-2"' . '<"col-sm-12 col-md-6"i>' . '<"col-sm-12 col-md-6"p>' . '>';
    }
}
