<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\EmployeeRepository;
use App\Repositories\EloquentEmployeeRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EmployeeRepository::class, EloquentEmployeeRepository::class);
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
