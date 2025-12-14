<?php

namespace Vendor\RapidSender\Exceptions;

use Exception;

class RapidSenderException extends Exception
{
    public function __construct(
        string $message,
        public array $context = []
    ) {
        parent::__construct($message);
    }
}

