<?php

namespace Tests\Tasks;

use MyApp\Tasks\Ex5;
use PHPUnit\Framework\TestCase;

final class Ex5Test extends TestCase
{
    protected Ex5 $ex5;

    protected function setUp(): void
    {
        $this->ex5 = new Ex5();
    }

    /**
     * @dataProvider fizzBuzzProvider
     */
    public function testFizzBuzzGenerate(int $begin, int $end, string $expected): void
    {
        $this->assertEquals($expected, $this->ex5->fizzBuzzGenerate($begin, $end));
    }

    public function fizzBuzzProvider(): array
    {
        return [
            [1, 2, '1 2'],
            [3, 10, 'Fizz 4 Buzz Fizz 7 8 Fizz Buzz'],
            [8, 20, '8 Fizz Buzz 11 Fizz 13 14 FizzBuzz 16 17 Fizz 19 Buzz'],
            [10, 2, ''],
            [10, 10, 'Buzz'],
        ];
    }
}
