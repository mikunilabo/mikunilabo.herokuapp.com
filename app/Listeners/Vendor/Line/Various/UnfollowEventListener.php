<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use LINE\LINEBot\Event\UnfollowEvent;
use Revolution\Line\Facades\Bot;

class UnfollowEventListener
{
    /**
     * @param  UnfollowEvent  $event
     * @return void
     */
    public function handle(UnfollowEvent $event)
    {
        //
    }
}
