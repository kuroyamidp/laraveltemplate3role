<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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
        Blade::if('IsAdmin', function () {
            return Auth::user()->role_id == 0;
        });
        Blade::if('IsDosen', function () {
            return Auth::user()->role_id == 1;
        });
        Blade::if('IsMahasiswa', function () {
            return Auth::user()->role_id == 2;
        });
    }
}
