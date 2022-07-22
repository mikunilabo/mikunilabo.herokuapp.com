<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use App\Services\Vendor\Line\Line;
use LINE\LINEBot\Event\UnfollowEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
