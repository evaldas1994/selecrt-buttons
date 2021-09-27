<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\StockhRepositoryInterface;
use App\Repositories\StockhRepository;
use App\Repositories\VatRepository;
use App\Repositories\Interfaces\EloquentRepositoryInterface;
use App\Repositories\Interfaces\VatRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(EloquentRepositoryInterface::class,BaseRepository::class);
        $this->app->bind(VatRepositoryInterface::class, VatRepository::class);
        $this->app->bind(StockhRepositoryInterface::class, StockhRepository::class);

    }
}
