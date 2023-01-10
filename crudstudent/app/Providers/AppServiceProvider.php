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
        // Dao 
        $this->app->bind('App\Contracts\Dao\Data\DataDaoInterface', 'App\Dao\Data\DataDao');
        $this->app->bind('App\Contracts\Dao\Major\MajorDaoInterface', 'App\Dao\Major\MajorDao');
        $this->app->bind('App\Contracts\Dao\Student\StudentDaoInterface', 'App\Dao\Student\StudentDao');


        // Service
        $this->app->bind('App\Contracts\Services\Data\DataServiceInterface', 'App\Services\Data\DataService');
        $this->app->bind('App\Contracts\Services\Major\MajorServiceInterface', 'App\Services\Major\MajorService');
        $this->app->bind('App\Contracts\Services\Student\StudentServiceInterface', 'App\Services\Student\StudentService');
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
