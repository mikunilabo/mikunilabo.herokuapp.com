<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use App\Services\Vendor\Line\Line;
use LINE\LINEBot\Event\PostbackEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
