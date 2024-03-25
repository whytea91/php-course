<?php

namespace tests;

use MyApp\Ex7;
use PHPUnit\Framework\TestCase;

class Ex7Test extends TestCase
{
    protected $ex7;

    protected function setUp(): void
    {
        $this->ex7 = new Ex7();
    }

    /**
     * @dataProvider fibProvider
     */
    public function testFib(int $result, int $number): void
    {
        $this->assertEquals($result, $this->ex7->fib($number));
    }

    public function fibProvider(): array
    {
        return [
          [0, 0],
          [1, 1],
          [5, 5],
          [75025, 25],
        ];
    }
}
