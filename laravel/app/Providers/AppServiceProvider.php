<?php

namespace App\Providers;

use App\Repositories\ArtWorkImageRepository;
use App\Repositories\ArtWorkRepository;
use App\Repositories\CollectionRepository;
use App\Repositories\Interfaces\ArtWorkImageRepositoryInterface;
use App\Repositories\Interfaces\ArtWorkRepositoryInterface;
use App\Repositories\Interfaces\CollectionRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
         $this->app->bind(
        ArtWorkRepositoryInterface::class,
        ArtWorkRepository::class
    );

    $this->app->bind(
        ArtWorkImageRepositoryInterface::class,
        ArtWorkImageRepository::class
    );
    $this->app->bind(
        CollectionRepositoryInterface::class,
        CollectionRepository::class
    );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
