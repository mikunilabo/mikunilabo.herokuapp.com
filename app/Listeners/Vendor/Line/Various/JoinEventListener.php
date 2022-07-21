<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use LINE\LINEBot\Event\JoinEvent;
use Revolution\Line\Facades\Bot;

class JoinEventListener
{
    /**
     * @param  JoinEvent  $event
     * @return void
     */
    public function handle(JoinEvent $event)
    {
        //
    }
}
