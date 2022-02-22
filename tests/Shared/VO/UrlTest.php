<?php

namespace App\Shared\VO;


use App\Shared\VO\Exception\InvalidValue;
use App\Shared\VO\Url\Url;
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    /**
     * @dataProvider urlsValidData
     */
    public function testUrlValid(string $value): void
    {
        $url = new Url(url: $value);
        $this->assertInstanceOf(expected: Url::class, actual: $url);
    }

    public function urlsValidData(): array
    {
        return [
            ["https://teste.com"],
            ["https://teste.teste.com"],
            ["https://teste.teste.com?id=1234&teste=projeto"]
        ];
    }

    /**
     * @dataProvider urlsInvalidData
     */
    public function testUrlInvalid(string $value)
    {
        $this->expectException(exception: InvalidValue::class);
        new Url(url: $value);

    }

    public function urlsInvalidData(): array
    {
        return [
            ["http's://teste&64.com"],
            ["https://teste.t=este.com"],
            ["http's://teste.teste.com?id=1234&teste=proje'to"]
        ];
    }
}