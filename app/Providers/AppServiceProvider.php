<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->defaultStringLength();
        $this->forceHttps();
        $this->registerProviders();
    }

    private function defaultStringLength()
    {
        Schema::defaultStringLength(length: 191);
    }

    /**
     * @return void
     */
    private function forceHttps(): void
    {
        /**
         * Force Https connection under certain circumstances and conditions.
         */
        if (true === config('session.secure')) {
            URL::forceScheme('https');
        }
    }

    /**
     * @return void
     */
    private function registerProviders(): void
    {
        foreach (config('providers') as $provider => $options) {
            if (!$options['enable']) continue;

            $this->app->register($options['provider']);
        }
    }
}
