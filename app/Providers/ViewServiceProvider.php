<?php

namespace App\Providers;
use App\Models\FaqCategory;

use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\User;
use App\Models\ArtCategory;
use App\Models\Artist;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;
use View;
use Nnjeim\World\Models\Country;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['admin.users.fields'], function ($view) {
            $view->with('roleItems', Role::pluck('name', 'name')->toArray());
        });
        View::composer(['admin.user_profiles.edit'], function ($view) {
            $view->with('countryCode', Country::pluck('iso3', 'iso3')->toArray());
            $countries = Country::all();
            $currencyCodes = [];
            foreach ($countries as $country) {
                $currencyCodes[$country->currency['code']] = $country->currency['code'];
            }
            $view->with('currencyCode', $currencyCodes);

        });
    }
}
