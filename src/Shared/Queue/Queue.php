<?php

namespace App\Shared\Queue;

interface Queue extends Publishable
{
    /**
     * @param string $vhost
     * @return Connection
     */
    public function retrieveConnection(string $vhost = '/'): Connection;

    /**
     * @param string $vhost
     * @return bool
     */
    public function isConnected(string $vhost = '/'): bool;

    /**
     * @param string $vhost
     * @return void
     */
    public function disconnect(string $vhost = '/'): void;
}