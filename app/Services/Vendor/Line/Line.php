<?php
declare(strict_types=1);

namespace App\Services\Vendor\Line;

use App\Exceptions\Domain\UnexpectedResponseException;
use Illuminate\Support\Str;
use LINE\LINEBot;
use LINE\LINEBot\Constant\HTTPHeader;
use LINE\LINEBot\Event\BaseEvent;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;

class Line
{
    /**
     * @var LINEBot
     */
    private $bot;

    /**
     * @return void
     */
    public function __construct()
    {
        $botAccessToken = config('services.line.bot.channel_token');
        $botChannelSecret = config('services.line.bot.channel_secret');

        $client = new CurlHTTPClient ($botAccessToken);
        $this->bot = new LINEBot($client, ['channelSecret' => $botChannelSecret]);
    }

    /**
     * @return string
     */
    public static function signature(): string
    {
        return HTTPHeader::LINE_SIGNATURE;
    }

    /**
     * @param string $body
     * @param string $signature
     * @return LINEBot
     */
    public function bot(): LINEBot
    {
        return $this->bot;
    }
}
