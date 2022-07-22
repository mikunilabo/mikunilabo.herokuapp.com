<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line;

use App\Events\Vendor\Line\ReceivedWebhook;
use App\Services\Vendor\Line\Line;
// use Illuminate\Http\Request;
// use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Support\Facades\Notification;

final class WebhookListener
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
     * @param ReceivedWebhook $event
     * @return void
     */
    public function handle(ReceivedWebhook $event)
    {
        foreach ($event->lineWebhookEvents as $e) {
            if ($e->getMode() === 'standby') {// 通常: active
                // XXX LINE側で今後実装予定とのこと 2022/7/5 kwada
                logger()->error('LINE Webhook event getMode() === standby（チャネルが待機状態）', $e->getEvent());
            }

            /**
             * LINE Events
             * @see https://developers.line.biz/ja/reference/messaging-api/#scenario-result-event
             * XXX 実際の処理はイベント発火のみだが、未実装の場合は特定のメッセージを投げたいので、switch構文にしておく
             */
            switch ($e->getType()) {
                /**
                 * デベロッパーコンソールで自動応答メッセージ対応等、返信不要な場合はここで
                 */
                case 'follow':// 友だち追加 or ブロック解除（自動応答メッセージ設定中）
                case 'unfollow':// ブロックされた時（そもそもメッセージを送れない...）
                case 'unsend':// ユーザーがグループトークまたは複数人トークで、メッセージの送信を取り消したことを示すイベントです。
                case 'leave':// LINE公式アカウント削除 or 退出（そもそもメッセージを送れない...）
                    break;

//                 case 'join':// LINE公式アカウントがグループトークや複数人トークに参加したことを示すイベントです。参加イベントには応答できます。
//                 case 'memberJoined':// LINE公式アカウントがメンバーになっているグループトークまたは複数人トークにユーザーが参加したことを示すイベントです。
//                 case 'memberLeft':// LINE公式アカウントがメンバーになっているグループトークまたは複数人トークからユーザーが退出したことを示すイベントです。
//                 case 'postback':// ユーザーが、ポストバックアクションを実行したことを示すイベントオブジェクトです。ポストバックイベントには応答できます。
//                 case 'videoPlayComplete':// LINE公式アカウントから送信されたtrackingIdが指定された動画の視聴を、ユーザーが少なくとも一回最後まで視聴したことを示すイベントです。
//                 case 'beacon':// ビーコンの電波の受信圏にユーザーが入ったことを示すイベントオブジェクトです。ビーコンイベントには応答できます。
//                 case 'accountLink':// ユーザーがLINEアカウントとプロバイダーが提供するサービスのアカウントを連携したことを示すイベントオブジェクトです。アカウント連携イベントには応答できます。
//                 case 'things':// ユーザーの操作により、デバイスとLINEが連携されたことを示すイベントです。（things.type === link）
                                // ユーザーの操作により、デバイスとLINEが連携解除されたことを示すイベントです。（things.type === unlink）
                                // 自動通信のシナリオが実行されたことを示すイベントです。シナリオセットごとにまとめて実行結果が返されるのではなく、シナリオごとに実行結果が返されます。（things.type === scenarioResult）
                case 'message':
                    switch ($e->getMessageType()) {
                        case 'sticker':// スタンプ
//                         case 'location':// 位置情報
//                         case 'file':// ファイル
//                         case 'audio':// 音声
//                         case 'video':// 動画
//                         case 'image'://画像
                        case 'text':
                            event($e);// XXX 実装済の場合はここで落ち着く
                            break 2;// 最初のループを抜ける
                    }
                default:
                    $this->line->bot()->replyText($e->getReplyToken(), 'すみません、本LINE公式アカウントでは、対応出来ないアクションです...');
            }
        }
        return response('', 200);// XXX LINE側にHTTPステータス200を返す必要あり
    }
}
