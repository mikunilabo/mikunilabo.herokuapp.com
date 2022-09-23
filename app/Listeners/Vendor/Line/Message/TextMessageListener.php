<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Message;

use App\Services\Vendor\Line\Line;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use LINE\LINEBot\Event\MessageEvent\TextMessage;
use LINE\LINEBot\MessageBuilder\RawMessageBuilder;
use LINE\LINEBot\Response;

class TextMessageListener
{
    /**
     * @var Line
     */
    private $line;

    /**
     * @var TextMessage
     */
    private $event;

    /**
     * @param Line $line
     * @return void
     */
    public function __construct(Line $line)
    {
        $this->line = $line;
    }

    /**
     * @param  TextMessage  $event
     * @return void
     */
    public function handle(TextMessage $event)
    {
        $this->event = $event;

        $response = $this->process();

        if (! $response->isSucceeded()) {
            logger()->error(static::class.$response->getHTTPStatus(), $response->getJSONDecodedBody());
        }
    }

    /**
     * @return Response
     */
    private function process(): Response
    {
        switch ($text = $this->event->getText()) {
            case '査定':
            case '商品履歴':
            case '検品':
            case '卸登録':
            case 'メッセージ':
            case 'お知らせ':
                return $this->line->bot()
                    ->replyText($this->replyToken(), sprintf('%sですね！現在未実装です。', $text));

            case '年齢':
                return $this->line->bot()
                    ->replyMessage($this->replyToken(), new RawMessageBuilder($this->agesQuickReply()));

            default:
                return $this->line->bot()
                    ->replyText($this->replyToken(), $this->randomMessage());
        }
    }

    /**
     * @return string
     */
    private function replyToken(): string
    {
        return $this->event->getReplyToken();
    }

    /**
     * @return string
     */
    private function randomMessage(): string
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

    /**
     * @return array
     */
    public function agesQuickReply(): array
    {
        return [
            'type' => 'text',
            'text' => 'あなたの年齢を教えてください。',
            'quickReply' => [
                'items' => $this->agesArray(),
            ]
        ];
    }

    /**
     * @return array
     */
    public function agesArray(): array
    {
        $arr = [];
        for ($i=10; $i<60; $i+=10) {
            $arr[] = [
                'type' => 'action',
                'action' => [
                    'type' => 'message',
                    'label' => $label = sprintf('%s代', $i),
                    'text' => $label,// アクションの実行時に送信されるテキスト
                    //ここへ次の回答時にフローを繋げるための一意のIDを付加しておく必要あると思っていたが、トーク画面で出力されてしまうので、要再考慮...
                ],
            ];
        }
        return $arr;
    }
}
