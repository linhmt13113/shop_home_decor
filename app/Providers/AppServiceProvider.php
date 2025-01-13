<?php

namespace App\Providers;

use App\Http\View\Composers\CartComposer;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\MenuComposer;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
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
        View::composer('header', MenuComposer::class);
        View::composer('cart', CartComposer::class);
        // View::composer('*', CartComposer::class);

    }
}
