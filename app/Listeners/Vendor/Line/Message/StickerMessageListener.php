<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Message;

use App\Services\Vendor\Line\Line;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use LINE\LINEBot\Event\MessageEvent\StickerMessage;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;

class StickerMessageListener
{
    /**
     * @var Line
     */
    private $line;

    /**
     * @param Line $line
     * @return void
     */
    public function __construct(Line $line)
    {
        $this->line = $line;
    }

    /**
     * @param  StickerMessage  $event
     * @return void
     */
    public function handle(StickerMessage $event)
    {
        $this->line->bot()->replyText($event->getReplyToken(), 'すみません、文字で入力していただけますか..💦');

//         $packageId = $event->getPackageId();
//         $stickerId = $event->getStickerId();

//         $this->line->bot()->replyMessage($event->getReplyToken(), new StickerMessageBuilder($packageId, $stickerId));
    }
}
