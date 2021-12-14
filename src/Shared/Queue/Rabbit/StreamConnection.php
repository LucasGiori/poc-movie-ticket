<?php

namespace App\Shared\Queue\Rabbit;

use App\Shared\Queue\Connection;
use Exception;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class StreamConnection extends AMQPStreamConnection implements Connection
{
    public function __construct(ConnectionData $connectionData)
    {
        parent::__construct(
            host: $connectionData->getHost(),
            port: $connectionData->getPort(),
            user: $connectionData->getUser(),
            password: $connectionData->getPassword(),
            connection_timeout: $connectionData->getConnectTimeout(),
            read_write_timeout: $connectionData->getReadTimeout(),
            heartbeat: $connectionData->getHeartBeat()
        );
    }
}