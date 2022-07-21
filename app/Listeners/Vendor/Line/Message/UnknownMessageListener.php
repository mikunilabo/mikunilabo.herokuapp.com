<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Message;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use LINE\LINEBot\Event\MessageEvent\UnknownMessage;
use Revolution\Line\Facades\Bot;

class UnknownMessageListener
{
    /**
     * @param  UnknownMessage  $event
     * @return void
     */
    public function handle(UnknownMessage $event)
    {
        //
    }
}
