<?php

namespace App\Providers;

use App\Repositories\Eloquent\ItemCategoryRepository;
use App\Repositories\Eloquent\ItemRepository;
use App\Repositories\ItemCategoryRepositoryInterface;
use App\Repositories\ItemRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ItemRepositoryInterface::class, ItemRepository::class);
        $this->app->bind(ItemCategoryRepositoryInterface::class, ItemCategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
