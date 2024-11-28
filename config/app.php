<?php

use Illuminate\Support\Facades\Facade;

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Codiksh'),

    'GOOGLE_MAP_API_KEY' => env('GOOGLE_MAP_API_KEY', 'AIzaSyCvw0ZqufReMkpx9YuvWLlEVv1oeslE4to'),
//    'GOOGLE_MAP_API_KEY' => env('GOOGLE_MAP_API_KEY', 'AIzaSyDUC73wk4-yrBlIKZOy7j1ya2_dv9MFiGw'),
    'MAIL_API_KEY' => env('MAIL_API_KEY', 'key-d0b892f98309d183705bb3e633eaff45'),
    'MAIL_EMAIL' => env('MAIL_EMAIL', 'info@acecare.ca'),
    'MAIL_DOMAIN' => env('MAIL_DOMAIN', 'acecare.ca'),
    'TEXTUS_API_KEY' => env('TEXTUS_API_KEY', 'eyJhbGciOiJFRDI1NTE5In0.eyJzdWIiOiI2MDFhMTJlZDQyOGQ4NTcwMTQzYyIsImlhdCI6MTYwMzE3NzQwMX0.yAAqzbI9wZ31Cu5WB4DMw-UQM3U1bRgv4RBxtGj6tUnzb0eVe857lumxjesYZSib4cyKR9NeCV2EN2i1milkDg'),
    'BAMBORA_API_KEY' => env('BAMBORA_API_KEY', 'MzgzNjExNTM5OmNjOTMxYjgzMDg3NzQwQTM5N0RhMjQyM2I0QjE5MjBk'),

    'MAILGUN_SECRET_EMAIL' => env('MAILGUN_SECRET', 'key-d0b892f98309d183705bb3e633eaff45'),
    'MAILGUN_DOMAIN_EMAIL' => env('MAILGUN_DOMAIN', 'aceap.ca'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL', null),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
      'driver' => 'file',
      // 'store'  => 'redis',
    ],

    'aliases' => Facade::defaultAliases()->merge([
        // 'ExampleClass' => App\Example\ExampleClass::class,
        'Helper' => App\Helpers\Helpers::class
    ])->toArray(),
];
