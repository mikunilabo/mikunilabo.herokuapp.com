<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Message;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use LINE\LINEBot\Event\MessageEvent\TextMessage;
use Revolution\Line\Facades\Bot;

class TextMessageListener
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
     * @param  TextMessage  $event
     * @return void
     */
    public function handle(TextMessage $event)
    {
        $response = Bot::replyText($event->getReplyToken(), $this->message());

        if (! $response->isSucceeded()) {
            logger()->error(static::class.$response->getHTTPStatus(), $response->getJSONDecodedBody());
        }
    }

    /**
     * @return string
     */
    private function message(): string
    {
        switch (mt_rand(0, 2)) {
            case 0:
                return '「査定」「商品履歴」など、ご用件を入力してください。';
            case 1:
                return '「検品」「卸登録」など、ご用件を入力してください。';
            case 2:
                return '「メッセージ」「お知らせ」など、ご用件を入力してください。';
            default:
                return 'すみません、AIがリプライを思い付かなかったです..💦';
        }
    }
}
