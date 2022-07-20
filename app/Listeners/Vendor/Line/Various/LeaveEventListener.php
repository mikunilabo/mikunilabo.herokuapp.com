<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use LINE\LINEBot\Event\LeaveEvent;
use Revolution\Line\Facades\Bot;

class LeaveEventListener
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
     * @param  LeaveEvent  $event
     * @return void
     */
    public function handle(LeaveEvent $event)
    {
        //
    }
}
