<?php

namespace tests;

use MyApp\Ex4;
use PHPUnit\Framework\TestCase;

class Ex4Test extends TestCase
{
    protected $ex4;

    protected function setUp(): void
    {
        $this->ex4 = new Ex4();
    }

    /**
     * @dataProvider isHappyProviderTrue
     */
    public function testIsHappyTrue(string $ticket): void
    {
        $this->assertTrue($this->ex4->isHappy($ticket));
    }

    public function isHappyProviderTrue(): array
    {
        return [
            ['123321'],
            [''],
        ];
    }

    /**
     * @dataProvider isHappyProviderFalse
     */
    public function testIsHappyFalse(string $ticket): void
    {
        $this->assertFalse($this->ex4->isHappy($ticket));
    }

    public function isHappyProviderFalse(): array
    {
        return [
            ['123456'],
            ['12345'],
            ['9'],
        ];
    }
}
