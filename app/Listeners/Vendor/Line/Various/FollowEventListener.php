<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use LINE\LINEBot\Event\FollowEvent;
use Revolution\Line\Facades\Bot;

class FollowEventListener
{
    /**
     * @param  FollowEvent  $event
     * @return void
     */
    public function handle(FollowEvent $event)
    {
        //
    }
}
