<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Message;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use LINE\LINEBot\Event\MessageEvent\ImageMessage;
use Revolution\Line\Facades\Bot;

class ImageMessageListener
{
    /**
     * @var TextMessage
     */
    private $event;

    /**
     * Handle the event.
     *
     * @param  ImageMessage  $event
     * @return void
     */
    public function handle(ImageMessage $event)
    {
        //
    }
}
