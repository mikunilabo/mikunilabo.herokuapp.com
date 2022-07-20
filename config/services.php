<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    /*
     |--------------------------------------------------------------------------
     | Line Services Credentials
     |--------------------------------------------------------------------------
     */
    'line' => [
        /**
         * LINE Login.
         */
        // 'client_id' => env('LINE_LOGIN_CLIENT_ID'),
        // 'client_secret' => env('LINE_LOGIN_CLIENT_SECRET'),
        // 'redirect' => env('LINE_LOGIN_REDIRECT'),

        /**
         * Messaging / Bot.
         */
        'bot' => [
            'channel_token' => env('LINE_BOT_CHANNEL_TOKEN'),
            'channel_secret' => env('LINE_BOT_CHANNEL_SECRET'),
            'path' => env('LINE_BOT_WEBHOOK_PATH', 'line/webhook'),
            'route' => env('LINE_BOT_WEBHOOK_ROUTE', 'line.webhook'),
            'domain' => env('LINE_BOT_WEBHOOK_DOMAIN'),
            'middleware' => env('LINE_BOT_WEBHOOK_MIDDLEWARE', 'throttle'),
        ],

        /**
         * LINE Notify.
         */
        // 'notify' => [
        //     'client_id' => env('LINE_NOTIFY_CLIENT_ID'),
        //     'client_secret' => env('LINE_NOTIFY_CLIENT_SECRET'),
        //     'redirect' => env('LINE_NOTIFY_REDIRECT'),
        //     'personal_access_token' => env('LINE_NOTIFY_PERSONAL_ACCESS_TOKEN'),
        // ],
    ],
];
