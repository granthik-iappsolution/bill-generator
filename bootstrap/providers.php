<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\AuthServiceProvider::class,
    // App\Providers\BroadcastServiceProvider::class,
    App\Providers\EventServiceProvider::class,
    App\Providers\RouteServiceProvider::class,
    \App\Providers\ViewServiceProvider::class,
    \App\Providers\MenuServiceProvider::class,
    Spatie\Html\HtmlServiceProvider::class,
    Codiksh\Generator\CodikshGeneratorServiceProvider::class,
    Spatie\Permission\PermissionServiceProvider::class,
    Intervention\Image\ImageServiceProvider::class,
];
