<?php

namespace App\Domain\Checkout;

use App\Shared\VO\Url\Url;
use DateTime;

class Checkout
{
    public function __construct(
        private DateTime $initializedAt,
        private DateTime $expiresAt,
        private Url $url
    ) {}
}
