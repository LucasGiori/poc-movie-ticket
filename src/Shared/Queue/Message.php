<?php

namespace App\Shared\Queue;

use App\Shared\VO\Immutable;

interface Message extends Immutable
{
    /**
     * @return string
     */
    public function toJson(): string;

    /**
     * @return string
     */
    public function getQueueName(): string;

    /**
     * @param Publishable $queue
     */
    public function publish(Publishable $queue): void;
}