<?php

namespace App\Providers;

use App\Http\Auth\CustomUserProvider;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

//    public $bindings = [
//        UserProvider::class => CustomUserProvider::class,
//    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
