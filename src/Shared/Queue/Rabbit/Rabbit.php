<?php

namespace App\Shared\Queue\Rabbit;

use App\Shared\Queue\Connection;
use App\Shared\Queue\Message;
use App\Shared\Queue\Queue;
use Exception;

class Rabbit implements Queue
{
    /**
     * @param StreamConnection $connection
     * @return static
     */
    public static function instance(StreamConnection $connection): self
    {
        return new static(connection: $connection);
    }

    /**
     * @param StreamConnection $connection
     */
    public function __construct(
        private StreamConnection $connection
    ) {}


    /**
     * @param Message $message
     * @return void
     */
    public function publishMessage(Message $message): void
    {
        $channel = new Channel(connection: $this->connection, message: $message);
        $channel->publish();
        $channel->close();
    }

    /**
     * @param string $vhost
     * @return Connection
     */
    public function retrieveConnection(string $vhost = '/'): Connection
    {
        return $this->connection;
    }

    /**
     * @param string $vhost
     * @return bool
     */
    public function isConnected(string $vhost = '/'): bool
    {
        return $this->connection->isConnected();
    }

    /**
     * @param string $vhost
     * @return void
     * @throws Exception
     */
    public function disconnect(string $vhost = '/'): void
    {
       $this->connection->close();
    }
}