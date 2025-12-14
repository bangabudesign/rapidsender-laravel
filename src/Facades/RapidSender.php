<?php

namespace Vendor\RapidSender\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \RapidSender\Client\RapidSenderClient send(string $to, \RapidSender\Messages\RapidSenderMessage $message)
 * @method static \GuzzleHttp\Client getClient()
 *
 * @see \RapidSender\Client\RapidSenderClient
 */
class RapidSender extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'rapidsender';
    }
}

