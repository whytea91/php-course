<?php

namespace tests;

use MyApp\Ex6;
use PHPUnit\Framework\TestCase;

class Ex6Test extends TestCase
{
    protected $ex6;

    protected function setUp(): void
    {
        $this->ex6 = new Ex6();
    }

    /**
     * @dataProvider addDigitsProvider
     */
    public function testAddDigits(int $expected, int $number): void
    {
        $this->assertEquals($expected, $this->ex6->addDigits($number));
    }

    public function addDigitsProvider(): array
    {
        return [
            [0, 0],
            [1, 1],
            [9, 9],
            [1, 10],
            [1, 19],
            [2, 38],
            [8, 1259],
        ];
    }
}
