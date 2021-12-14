<?php

namespace App\Shared\Queue;

interface Publishable
{
    /**
     * @param Message $message
     * @return void
     */
    public function publishMessage(Message $message): void;
}