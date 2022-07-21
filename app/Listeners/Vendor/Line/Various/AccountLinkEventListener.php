<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use LINE\LINEBot\Event\AccountLinkEvent;
use Revolution\Line\Facades\Bot;

class AccountLinkEventListener
{
    /**
     * @param  AccountLinkEvent  $event
     * @return void
     */
    public function handle(AccountLinkEvent $event)
    {
        //
    }
}
