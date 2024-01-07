<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Http\Auth\CustomUserProvider;
use App\Models\Vartotojas;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
//        $a = 'b';
        Auth::provider('eloquent', function (Application $app, array $config) {
            return new CustomUserProvider(
                $app->make(HasherContract::class),
                Vartotojas::class
            );
        });
    }


}
