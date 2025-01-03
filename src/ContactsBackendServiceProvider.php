<?php

namespace ClarionApp\ContactsBackend;

use ClarionApp\Backend\ClarionPackageServiceProvider;

class ContactsBackendServiceProvider extends ClarionPackageServiceProvider
{
    public function boot(): void
    {
        parent::boot();

        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
