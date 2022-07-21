<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use LINE\LINEBot\Event\MemberLeaveEvent;
use Revolution\Line\Facades\Bot;

class MemberLeaveEventListener
{
    /**
     * @param  MemberLeaveEvent  $event
     * @return void
     */
    public function handle(MemberLeaveEvent $event)
    {
        //
    }
}
