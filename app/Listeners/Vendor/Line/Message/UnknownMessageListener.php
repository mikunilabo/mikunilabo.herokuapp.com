<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Message;

use App\Services\Vendor\Line\Line;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use LINE\LINEBot\Event\MessageEvent\UnknownMessage;

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
