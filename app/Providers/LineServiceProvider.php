<?php
declare(strict_types=1);

namespace App\Providers;

use App\Services\Vendor\Line\Line;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

final class LineServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->app->singleton('line', Line::class);
    }

    /**
     * {@inheritDoc}
     * @see \Illuminate\Support\ServiceProvider::provides()
     * @return array
     */
    public function provides(): array
    {
        return [
            'line',
        ];
    }
}
