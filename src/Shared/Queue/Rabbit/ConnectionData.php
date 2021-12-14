<?php

namespace App\Shared\Queue\Rabbit;

use App\Shared\VO\Vo;

class ConnectionData extends Vo
{
    /**
     * @param string $host
     * @param int|string $port
     * @param string $user
     * @param string $password
     * @param int $connectTimeout
     * @param int $readTimeout
     * @param int $heartBeat
     */
    public function __construct(
        private string $host,
        private int|string $port,
        private string $user,
        private string $password,
        private int $connectTimeout = 1,
        private int $readTimeout = 1,
        private int $heartBeat = 0

    ) {}

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return int|string
     */
    public function getPort(): int|string
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return int
     */
    public function getConnectTimeout(): int
    {
        return $this->connectTimeout;
    }

    /**
     * @return int
     */
    public function getReadTimeout(): int
    {
        return $this->readTimeout;
    }

    /**
     * @return int
     */
    public function getHeartBeat(): int
    {
        return $this->heartBeat;
    }
}
