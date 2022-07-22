<?php
declare(strict_types=1);

namespace App\Listeners\Vendor\Line\Various;

use App\Services\Vendor\Line\Line;
use Illuminate\Queue\InteractsWithQueue;
use LINE\LINEBot\Event\AccountLinkEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

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
