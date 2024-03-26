<?php

namespace Tests;

use MyApp\Ex4;
use PHPUnit\Framework\TestCase;

final class Ex4Test extends TestCase
{
    protected Ex4 $ex4;

    protected function setUp(): void
    {
        $this->ex4 = new Ex4();
    }

    /**
     * @dataProvider isHappyProvider
     */
    public function testIsHappy(string $ticket, bool $expected): void
    {
        $this->assertEquals($expected, $this->ex4->isHappy($ticket));
    }

    public function isHappyProvider(): array
    {
        return [
            ['123321', true],
            ['', true],
            ['123456', false],
            ['12345', false],
            ['9', false],
        ];
    }
}
