<?php

namespace Tests;

use MyApp\Ex8;
use PHPUnit\Framework\TestCase;

final class Ex8Test extends TestCase
{
    protected Ex8 $ex8;

    protected function setUp(): void
    {
        $this->ex8 = new Ex8();
    }

    /**
     * @dataProvider isPowerOfThreeProvider
     */
    public function testIsPowerOfThree(int $x, bool $expected): void
    {
        $this->assertEquals($expected, $this->ex8->isPowerOfThree($x));
    }

    public function isPowerOfThreeProvider(): array
    {
        return [
            [1, true],
            [3, true],
            [9, true],
            [27, true],
            [81, true],
            [59049, true],
            [3486784401, true],
            [10460353203, true],
            [94143178827, true],
            [0, false],
            [5, false],
            [6, false],
            [999999, false],
            [1234567890, false],
        ];
    }
}
