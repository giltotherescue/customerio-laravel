<?php

namespace Oscar\CustomerioLaravel;

use Illuminate\Support\ServiceProvider;

class CustomerioServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes(
                [__DIR__ . '/../config/customerio.php' => config_path('customerio.php')],
                'customerio-config'
            );
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/customerio.php', 'customerio');
    }
}
