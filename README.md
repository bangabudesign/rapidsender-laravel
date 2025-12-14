# RapidSender Laravel Notification Channel

Send WhatsApp notifications via RapidSender API using Laravel Notification system.

## Installation

```
composer require bangabudesign/rapidsender-laravel
```

## Configuration

```
php artisan vendor:publish --tag=rapidsender-config
```

Set env:

```
RAPIDSENDER_API_KEY=
RAPIDSENDER_CHANNEL_ID=
```

## Usage

```php
class InvoiceCreated extends Notification
{
    public function via($notifiable)
    {
        return ['rapidsender'];
    }

    public function toRapidSender($notifiable)
    {
        return RapidSenderMessage::make()
            ->to($notifiable->routeNotificationFor('rapidsender'))
            ->content('Invoice created successfully');
    }

}
```

## Routing Phone Number

```php
public function routeNotificationForRapidSender()
{
return $this->phone;
}
```

Recipient must be in international format (+628xxx)
