<?php

namespace App\Providers;

use App\Http\Interfaces\PlantRepositoryInterface;
use App\Http\Interfaces\RepositoryInterface;
use App\Repositories\PlantRepository;
use App\Repositories\Repository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
     $this->app->bind(RepositoryInterface::class,Repository::class);
        $this->app->bind(PlantRepositoryInterface::class,PlantRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
