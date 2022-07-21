<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use LINE\LINEBot\Event\MemberJoinEvent;
use Revolution\Line\Facades\Bot;

class MemberJoinEventListener
{
    /**
     * @param  MemberJoinEvent  $event
     * @return void
     */
    public function handle(MemberJoinEvent $event)
    {
        //
    }
}
