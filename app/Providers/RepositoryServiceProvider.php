<?php

namespace App\Providers;

use App\Interfaces\Repositories\ShortLinkRepositoryInterface;
use App\Repositories\EloquentRepository\ShortLinkRepository;
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
        $this->app->bind(
            ShortLinkRepositoryInterface::class,
            ShortLinkRepository::class
        );
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
