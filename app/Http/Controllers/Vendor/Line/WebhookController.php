<?php
declare(strict_types=1);

namespace App\Http\Controllers\Vendor\Line;

use App\Events\Vendor\Line\ReceivedWebhook;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LINE\LINEBot;
use LINE\LINEBot\Constant\HTTPHeader;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;

class WebhookController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $botAccessToken = config('services.line.bot.channel_token');
        $botChannelSecret = config('services.line.bot.channel_secret');

        $client = new CurlHTTPClient ($botAccessToken);
        $bot = new LINEBot($client, ['channelSecret' => $botChannelSecret]);

        $signature = $request->headers->get(HTTPHeader::LINE_SIGNATURE);
        $events = $bot->parseEventRequest($request->getContent(), $signature);

        event(new ReceivedWebhook($events));

        return response('', 200);// XXX LINE側にHTTPステータス200を返す必要あり
    }
}
