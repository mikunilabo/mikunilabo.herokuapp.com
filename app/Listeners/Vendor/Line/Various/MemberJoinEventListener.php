<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use App\Services\Vendor\Line\Line;
use LINE\LINEBot\Event\MemberJoinEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
