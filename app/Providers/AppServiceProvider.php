<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerProviders();

        Schema::defaultStringLength(length:191);
    }

    /**
     * @return void
     */
    private function registerProviders(): void
    {
        foreach (config('providers') as $provider => $options) {
            if (! $options['enable']) continue;

            $this->app->register($options['provider']);
        }
    }
}
