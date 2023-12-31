<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;


class RouteServiceProvider extends ServiceProvider
{

    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

       protected $namespace = 'App\Http\Controllers'; // need to add in Laravel 8
    

public function boot()
{
    // $this->configureRateLimiting();

    $this->routes(function () {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace) // need to add in Laravel 8
            ->group(base_path('routes/api.php'));

        Route::middleware('web')
            ->namespace($this->namespace) // need to add in Laravel 8
            ->group(base_path('routes/web.php'));
    });
}

}
