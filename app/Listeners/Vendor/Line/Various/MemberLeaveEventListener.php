<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use App\Services\Vendor\Line\Line;
use Illuminate\Queue\InteractsWithQueue;
use LINE\LINEBot\Event\MemberLeaveEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

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
