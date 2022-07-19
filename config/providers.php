<?php
declare(strict_types=1);

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Barryvdh\Debugbar\ServiceProvider as DebugbarServiceProvider;
use BeyondCode\DumpServer\DumpServerServiceProvider;

return [

    /*
     |--------------------------------------------------------------------------
     | Service providers configuration
     |--------------------------------------------------------------------------
     |
     */

    'debugbar' => [
        'enable' => env('DEBUGBAR_ENABLE', false),
        'provider' => DebugbarServiceProvider::class,
    ],

    'dump-server' => [
        'enable' => env('DUMPSERVER_ENABLE', false),
        'provider' => DumpServerServiceProvider::class,
    ],

    'idehelper' => [
        'enable' => env('IDEHELPER_ENABLE', false),
        'provider' => IdeHelperServiceProvider::class,
    ],
];
