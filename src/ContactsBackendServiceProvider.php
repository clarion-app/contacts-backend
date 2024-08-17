<?php

namespace ClarionApp\ContactsBackend;

use Illuminate\Support\ServiceProvider;

class ContactsBackendServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'../database/migrations');
    }
}
