<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Message;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use LINE\LINEBot\Event\MessageEvent\StickerMessage;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use Revolution\Line\Facades\Bot;

class StickerMessageListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  StickerMessage  $event
     * @return void
     */
    public function handle(StickerMessage $event)
    {
        Bot::replyText($event->getReplyToken(), 'すみません、文字で入力していただけますか..💦');

//         $packageId = $event->getPackageId();
//         $stickerId = $event->getStickerId();

//         Bot::replyMessage($event->getReplyToken(), new StickerMessageBuilder($packageId, $stickerId));
    }
}
