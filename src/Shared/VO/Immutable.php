<?php

namespace App\Shared\VO;

interface Immutable
{
    public function __unset(string $key): void;

    public function __get(string $key): void;

    public function __set(string $key, mixed $value): void;
}