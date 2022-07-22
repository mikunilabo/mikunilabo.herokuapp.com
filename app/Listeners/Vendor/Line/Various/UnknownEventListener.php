<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use App\Services\Vendor\Line\Line;
use LINE\LINEBot\Event\UnknownEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UnknownEventListener
{
    /**
     * @param  UnknownEvent  $event
     * @return void
     */
    public function handle(UnknownEvent $event)
    {
        //
    }
}
