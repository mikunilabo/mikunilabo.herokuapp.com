<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use LINE\LINEBot\Event\PostbackEvent;
use Revolution\Line\Facades\Bot;

class PostbackEventListener
{
    /**
     * @param  PostbackEvent  $event
     * @return void
     */
    public function handle(PostbackEvent $event)
    {
        //
    }
}
