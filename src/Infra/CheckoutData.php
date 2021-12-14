<?php

namespace App\Infra;

use App\Shared\Queue\Message;
use App\Shared\Queue\Publishable;
use App\Shared\VO\Immutability;

class CheckoutData implements Message
{
    use Immutability;

    public const QUEUE_NAME = 'send_email';

    public function __construct(
        private int $code,
        private string $message = ''
    ) {}

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    public function toJson(): string
    {
        return json_encode(get_object_vars($this));
    }

    public function getQueueName(): string
    {
        return static::QUEUE_NAME;
    }

    public function publish(Publishable $queue): void
    {
        $queue->publishMessage($this);
    }
}