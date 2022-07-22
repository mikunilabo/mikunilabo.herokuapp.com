<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use App\Services\Vendor\Line\Line;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use LINE\LINEBot\Event\VideoPlayCompleteEvent;

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
