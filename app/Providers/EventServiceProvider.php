<?php

namespace App\Providers;

use App\Events;
use App\Listeners;
use Illuminate\Auth\Events as LaravelEvents;
use Illuminate\Auth\Listeners as LaravelListeners;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use LINE\LINEBot\Event as LINEBotEvent;
// use SocialiteProviders;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        LaravelEvents\Registered::class => [
            LaravelListeners\SendEmailVerificationNotification::class,
        ],

        /**
         * SNS by SocialiteProviders
         */
        // SocialiteProviders\Manager\SocialiteWasCalled::class => [
        //     SocialiteProviders\Line\LineExtendSocialite::class,
        // ],

        /**
         * Line events
         */
        Events\Vendor\Line\ReceivedWebhook::class => [
            Listeners\Vendor\Line\WebhookListener::class,
        ],
        LINEBotEvent\MessageEvent\TextMessage::class => [
            Listeners\Vendor\Line\Message\TextMessageListener::class,
        ],
        LINEBotEvent\MessageEvent\StickerMessage::class => [
            Listeners\Vendor\Line\Message\StickerMessageListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
