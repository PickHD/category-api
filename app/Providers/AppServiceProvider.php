<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Services\CategoryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // repository
        $this->app->bind(CategoryRepository::class, function (Application $app) {
            return new CategoryRepository();
        });

        // service
        $this->app->bind(CategoryService::class, function (Application $app) {
            return new CategoryService($app->make(CategoryRepository::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
