<?php

namespace Tests\Feature;

use Tests\TestCase;
use RapidSender\Facades\RapidSender;
use RapidSender\Messages\RapidSenderMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SendNotificationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test sending a notification via RapidSender.
     *
     * @return void
     */
    public function test_can_send_notification()
    {
        $message = RapidSenderMessage::create('Test message');

        $response = RapidSender::send('+1234567890', $message);

        $this->assertNotNull($response);
    }

    /**
     * Test RapidSender message creation.
     *
     * @return void
     */
    public function test_can_create_rapidsender_message()
    {
        $message = RapidSenderMessage::create('Hello World')
            ->type('text');

        $this->assertEquals('Hello World', $message->getMessage());
        $this->assertEquals('text', $message->getType());
    }
}

