<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Message;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use LINE\LINEBot\Event\MessageEvent\VideoMessage;
use Revolution\Line\Facades\Bot;

class VideoMessageListener
{
    /**
     * @param  VideoMessage  $event
     * @return void
     */
    public function handle(VideoMessage $event)
    {
        //
    }
}
