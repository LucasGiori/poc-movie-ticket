<?php

namespace App\Shared\VO\Url;

use App\Shared\VO\Exception\InvalidValue;
use App\Shared\VO\Vo;

class Url extends Vo
{
    /**
     * @throws InvalidValue
     */
    public function __construct(
        private string $url = ''
    ) {
        if(!$this->isValid(value: $url)) {
            throw InvalidValue::withMessage(
                message: sprintf(
                    "O valor de(a) (%s) não é válido!",
                    get_class($this)
                )
            );
        }
    }

    public function isValid(mixed $value): bool
    {
        if(!is_string(value: $value) || !filter_var(value: $value, filter: FILTER_VALIDATE_URL)) {
            return false;
        }

        return true;
    }
}