<?php

namespace App\Shared\Queue\Rabbit;

use App\Shared\Queue\Message;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Message\AMQPMessage;

class Channel
{
    /**
     * @var AMQPChannel $amqpChannel
     */
    private AMQPChannel $amqpChannel;


    /**
     * @param StreamConnection $connection
     * @param Message $message
     */
    public function __construct(
        StreamConnection $connection,
        private Message $message
    )
    {
        $this->amqpChannel = $connection->channel();
        $this->queueDeclare();
    }


    /**
     * @return void
     */
    private function queueDeclare(): void
    {
        $this->amqpChannel->queue_declare(
            queue: $this->message->getQueueName(),
            passive: false,
            durable: false,
            exclusive: false,
            auto_delete: false
        );
    }


    /**
     * @param string $exchange
     * @return void
     */
    public function publish(string $exchange = ''): void
    {
        $this->amqpChannel->basic_publish(
            msg: new AMQPMessage(body: $this->message->toJson()),
            exchange: $exchange,
            routing_key: $this->message->getQueueName()
        );
    }

    /**
     * @return void
     */
    public function close(): void
    {
        $this->amqpChannel->close();
    }
}