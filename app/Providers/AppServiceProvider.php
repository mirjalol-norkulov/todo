<?php

namespace App\Providers;

use App\Services\RepositoryService;
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
        // Repository service
        $this->app->singleton('service', RepositoryService::class);
    }
}
