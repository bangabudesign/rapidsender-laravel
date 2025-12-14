<?php

namespace Vendor\RapidSender;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Notification;
use Vendor\RapidSender\Channels\RapidSenderChannel;

class RapidSenderServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/rapidsender.php',
            'rapidsender'
        );
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/rapidsender.php' => config_path('rapidsender.php'),
        ], 'rapidsender-config');

        Notification::extend('rapidsender', function ($app) {
            return new RapidSenderChannel(
                $app->make(\Vendor\RapidSender\Client\RapidSenderClient::class)
            );
        });
    }
}
