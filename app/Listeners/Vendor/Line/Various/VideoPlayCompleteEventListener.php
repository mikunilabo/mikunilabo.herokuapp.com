<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use LINE\LINEBot\Event\VideoPlayCompleteEvent;
use Revolution\Line\Facades\Bot;

class VideoPlayCompleteEventListener
{
    /**
     * @param  VideoPlayCompleteEvent  $event
     * @return void
     */
    public function handle(VideoPlayCompleteEvent $event)
    {
        //
    }
}
