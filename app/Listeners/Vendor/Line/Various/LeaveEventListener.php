<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use App\Services\Vendor\Line\Line;
use LINE\LINEBot\Event\LeaveEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LeaveEventListener
{
    /**
     * @param  LeaveEvent  $event
     * @return void
     */
    public function handle(LeaveEvent $event)
    {
        //
    }
}
