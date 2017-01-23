<?php

namespace Acada\Providers;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Acada\Repositories\Video\RepositoryInterface',
            'Acada\Repositories\Video\EloquentRepository'
        );

        $this->app->bind(
            'Acada\Repositories\Users\RepositoryInterface',
            'Acada\Repositories\Users\EloquentRepository'
        );
    }
}
