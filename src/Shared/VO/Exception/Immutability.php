<?php

namespace App\Shared\VO\Exception;

use LogicException;
use Throwable;

class Immutability extends LogicException implements ExceptionInterface
{
    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, Throwable|null $previous = null)
    {
        parent::__construct(message: $message, code: $code, previous:  $previous);
    }

    public static function withMessage(string $message, int $statusCode): mixed
    {
        return new static(message: $message, code: $statusCode);
    }
}