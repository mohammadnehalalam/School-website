<?php

namespace App\Providers;

use App\Models\Map;
use App\Models\BackImage;
use App\Models\CompanyProfile;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('content', CompanyProfile::first());
        view()->share('map', Map::first());
    }
}
