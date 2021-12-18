<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class ManageRouteServiceProvider extends ServiceProvider
{
    public const LOGIN = '/manage/login';
    public const DASHBOARD = '/manage/dashboard';
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
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/manage.php'));
    }
}
