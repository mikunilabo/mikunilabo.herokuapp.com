<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Message;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use LINE\LINEBot\Event\MessageEvent\AudioMessage;
use Revolution\Line\Facades\Bot;

class AudioMessageListener
{
    /**
     * @param  AudioMessage  $event
     * @return void
     */
    public function handle(AudioMessage $event)
    {
        //
    }
}
