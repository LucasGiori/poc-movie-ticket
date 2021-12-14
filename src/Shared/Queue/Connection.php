<?php

namespace App\Shared\Queue;

interface Connection
{
    /**
     * @return string
     */
    public function getChannelId();

    /**
     * @return void
     */
    public function close();
}