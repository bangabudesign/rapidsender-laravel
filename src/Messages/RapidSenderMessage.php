<?php

namespace Vendor\RapidSender\Messages;

use Vendor\RapidSender\Exceptions\RapidSenderException;

class RapidSenderMessage
{
    public string $to;
    public string $content;
    public ?string $sender = null;

    public static function make(): self
    {
        return new self();
    }

    public function to(string $recipient): self
    {
        if (! str_starts_with($recipient, '+')) {
            throw new RapidSenderException('Recipient must be in international format, e.g. +6281234567890');
        }

        $this->to = $recipient;
        return $this;
    }

    public function content(string $message): self
    {
        $this->content = $message;
        return $this;
    }

    public function sender(?string $sender): self
    {
        $this->sender = $sender;
        return $this;
    }
}
