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
     * @return mixed
     */
    public function parseEvent(string $body, string $signature)
    {
        return $this->bot->parseEventRequest($body, $signature);
    }

    // /**
    //  * @param string $token
    //  * @return bool
    //  * @throws UnexpectedResponseException
    //  */
    // public function verify(string $token): bool
    // {
    //     $response = $this->client->get($this->url, [
    //         'query' => [
    //             'secret' => $this->secret,
    //             'response' => $token,
    //         ],
    //     ]);

    //     $contents = json_decode($response->getBody()->getContents());

    //     if (($statusCode = $response->getStatusCode()) !== 200) {
    //         $id = Str::orderedUuid();
    //         $message = sprintf('The response status code from Google reCAPTCHA API is unexpected. [allowd: 200] [Returned code: %s] [log_id: %s]', $statusCode, $id);
    //         logger()->error($message, (array)$response);

    //         throw new UnexpectedResponseException(sprintf('%s [response: %s]', $message, $contents), $statusCode);
    //     }

    //     return $contents->success;
    // }
}
