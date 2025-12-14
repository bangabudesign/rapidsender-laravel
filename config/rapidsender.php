<?php

return [
    /*
    |--------------------------------------------------------------------------
    | RapidSender API Key
    |--------------------------------------------------------------------------
    |
    | Your RapidSender API key. You can get this from your RapidSender
    | dashboard.
    |
    */

    'api_key' => env('RAPIDSENDER_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | RapidSender API URL
    |--------------------------------------------------------------------------
    |
    | The base URL for the RapidSender API. This is optional and defaults
    | to the official RapidSender API endpoint.
    |
    */

    'base_url' => env('RAPIDSENDER_BASE_URL', 'https://rapidsender.net/api'),
    'default_sender' => env('RAPIDSENDER_CHANNEL_ID'),
    'timeout' => 10,
    'logging' => true,
];

