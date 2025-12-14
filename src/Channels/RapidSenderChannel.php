<?php

namespace Vendor\RapidSender\Channels;

use Illuminate\Notifications\Notification;
use Vendor\RapidSender\Client\RapidSenderClient;
use Vendor\RapidSender\Messages\RapidSenderMessage;

class RapidSenderChannel
{
    public function __construct(
        protected RapidSenderClient $client
    ) {}

    public function send($notifiable, Notification $notification)
    {
        if (! method_exists($notification, 'toRapidSender')) {
            return;
        }

        /** @var RapidSenderMessage $message */
        $message = $notification->toRapidSender($notifiable);

        return $this->client->send($message);
    }
}
