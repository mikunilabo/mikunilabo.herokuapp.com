<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use App\Services\Vendor\Line\Line;
use LINE\LINEBot\Event\ThingsEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ThingsEventListener
{
    /**
     * @param  ThingsEvent  $event
     * @return void
     */
    public function handle(ThingsEvent $event)
    {
        //
    }
}
