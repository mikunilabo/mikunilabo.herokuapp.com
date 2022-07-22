<?php
declare(strict_types=1);

namespace App\Http\Controllers\Vendor\Line;

use App\Events\Vendor\Line\ReceivedWebhook;
use App\Http\Controllers\Controller;
use App\Services\Vendor\Line\Line;// TODO XXX ファサード経由でサービスプロバイダへ登録したが、何故か実装クラスがNot Foundとなり要調査なので、一旦実装クラスを直接呼び出す...
use Illuminate\Http\Request;
use Illuminate\Http\Response;
//use LINE;// TODO XXX ファサード経由でサービスプロバイダへ登録したが、何故か実装クラスがNot Foundとなり要調査なので、一旦実装クラスを直接呼び出す...

class WebhookController extends Controller
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
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $signature = $request->headers->get($this->line::signature());
        $events = $this->line->bot()->parseEventRequest($request->getContent(), $signature);

        event(new ReceivedWebhook($events));

        return response('', 200);// XXX LINE側にHTTPステータス200を返す必要あり
    }
}
