<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use LINE\LINEBot\Event\JoinEvent;
use App\Services\Vendor\Line\Line;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
