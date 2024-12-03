<?php

return [
    [
        'name'      => 'Dashboard',
        'icon'      => '<i class="menu-icon tf-icons bx bxs-dashboard"></i>',
        'isHeader'  => false,
        'route'     => 'dashboard',
        'children'  => [],
    ],
    [
        'name'      => 'Users',
        'icon'      => '<i class="menu-icon tf-icons bx bx-user"></i>',
        'isHeader'  => false,
        'route'     => 'admin.users.index',
        'children'  => [],
    ],
    [
        'name'      => 'User Profiles',
        'icon'      => '<i class="menu-icon tf-icons bx bx-user-pin"></i>',
        'isHeader'  => false,
        'route'     => 'admin.user-profiles.index',
        'children'  => [],
    ],
    [
        'name'      => 'Roles',
        'icon'      => '<i class="menu-icon tf-icons bx bx-lock-open-alt"></i>',
        'isHeader'  => false,
        'route'     => 'admin.roles.index',
        'children'  => [],
    ],
    [
        'name'      => 'Customers',
        'icon'      => '<i class="menu-icon tf-icons bx bx-user-plus"></i>',
        'isHeader'  => false,
        'route'     => 'admin.customers.index',
        'children'  => [],
    ],
    [
    'name'      => 'Items',
    'icon'      => '<i class="menu-icon tf-icons bx bx-food-tag"></i>',
    'isHeader'  => false,
    'route'     => 'admin.items.index',
    'children'  => [],
]
];
