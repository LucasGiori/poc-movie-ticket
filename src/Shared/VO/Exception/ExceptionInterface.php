<?php

namespace App\Shared\VO\Exception;

interface ExceptionInterface
{
    public static function withMessage(string $message, int $statusCode): mixed;
}