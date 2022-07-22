<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use App\Services\Vendor\Line\Line;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use LINE\LINEBot\Event\BeaconDetectionEvent;

class BeaconDetectionEventListener
{
    /**
     * @param  BeaconDetectionEvent  $event
     * @return void
     */
    public function handle(BeaconDetectionEvent $event)
    {
        //
    }
}
