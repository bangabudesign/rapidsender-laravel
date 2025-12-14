<?php

namespace Vendor\RapidSender\Client;

use Illuminate\Support\Facades\Http;
use Vendor\RapidSender\Messages\RapidSenderMessage;
use Vendor\RapidSender\Exceptions\RapidSenderException;

class RapidSenderClient
{
    public function send(RapidSenderMessage $message)
    {
        $sender = $message->sender ?? config('rapidsender.default_sender');

        $response = Http::timeout(config('rapidsender.timeout'))
            ->withToken(config('rapidsender.api_key'))
            ->post(config('rapidsender.base_url') . '/v1/channels/' . $sender . '/messages', [
                'type' => 'text',
                'recipient'  => $message->to,
                'text' => $message->content,
            ]);

        if (! $response->successful()) {
            logger()->error('RapidSender API error', [
                'status' => $response->status(),
                'body'   => $response->json(),
                'raw'    => $response->body(),
            ]);
        
            throw new RapidSenderException(
                $response->json('message')
                ?? $response->body()
                ?? 'RapidSender API error'
            );
        }            

        return $response->json();
    }
}