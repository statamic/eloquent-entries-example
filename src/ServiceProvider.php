<?php

namespace Statamic\Eloquent\Entries;

use Statamic\Contracts\Entries\CollectionRepository as CollectionRepositoryContract;
use Statamic\Contracts\Entries\EntryRepository as EntryRepositoryContract;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    public function boot()
    {
        parent::boot();

        $this->registerMigrations();
    }

    public function register()
    {
        $this->app->bind(EntryRepositoryContract::class, EntryRepository::class);
        $this->app->bind(CollectionRepositoryContract::class, CollectionRepository::class);
    }

    protected function registerMigrations()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }
    }
}
