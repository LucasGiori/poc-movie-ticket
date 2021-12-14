<?php

namespace App\Shared\VO;

use App\Shared\VO\Exception\Immutability as ImmutabilityException;
use App\Shared\Enuns\StatusCode;

trait Immutability
{
    /**
     * @param string $key
     * @return void
     */
    public function __unset(string $key): void
    {
        ImmutabilityException::withMessage(
            message: "UNSET_IMMUTABLE",
            statusCode:  StatusCode::UNPROCESSABLE_ENTITY->value
        );
    }

    /**
     * @param string $key
     * @return void
     */
    public function __get(string $key): void
    {
        if (!property_exists($this, $key)) {
            ImmutabilityException::withMessage(
                message: "GET_UNDEFINED_OF_IMMUTABLE",
                statusCode:  StatusCode::UNPROCESSABLE_ENTITY->value
            );
        }
    }

    /**
     * @param mixed $key
     * @param mixed $value
     * @return void
     */
    public function __set(string $key, mixed $value): void
    {
        ImmutabilityException::withMessage(
            message: "SET_IMMUTABLE_STATE",
            statusCode:  StatusCode::UNPROCESSABLE_ENTITY->value
        );
    }
}