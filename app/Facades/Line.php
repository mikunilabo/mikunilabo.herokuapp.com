<?php
declare(strict_types=1);

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

final class Line extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'line';
    }
}
