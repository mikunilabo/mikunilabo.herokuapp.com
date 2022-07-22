<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use App\Services\Vendor\Line\Line;
use LINE\LINEBot\Event\FollowEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
