<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Message;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use LINE\LINEBot\Event\MessageEvent\LocationMessage;
use Revolution\Line\Facades\Bot;

class LocationMessageListener
{
    /**
     * @param  LocationMessage  $event
     * @return void
     */
    public function handle(LocationMessage $event)
    {
        //
    }
}
