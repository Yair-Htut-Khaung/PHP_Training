<?php

namespace App\Providers;

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
        $this->app->bind('App\Contracts\Dao\Data\DataDaoInterface', 'App\Dao\Data\DataDao');

        $this->app->bind('App\Contracts\Services\Data\DataServiceInterface', 'App\Services\Data\DataService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
