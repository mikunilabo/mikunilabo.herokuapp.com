<?php
declare(strict_types=1);

namespace App\Events\Vendor\Line;

// use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
// use Illuminate\Broadcasting\PresenceChannel;
// use Illuminate\Broadcasting\PrivateChannel;
// use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReceivedWebhook
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var array
     */
    public $lineWebhookEvents;

    /**
     * @param array $event
     * @return void
     */
    public function __construct(array $events)
    {
        $this->lineWebhookEvents = $events;
    }
}
