<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Resources\AgenciesCollection;

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
        AgenciesCollection::withoutWrapping();
        //
    }
}
