<?php

namespace tests;

use MyApp\Ex8;
use PHPUnit\Framework\TestCase;

class Ex8Test extends TestCase
{
    protected $ex8;

    protected function setUp(): void
    {
        $this->ex8 = new Ex8();
    }

    /**
     * @dataProvider isPowerOfThreeProviderTrue
     */
    public function testIsPowerOfThreeTrue(int $x): void
    {
        $this->assertTrue($this->ex8->isPowerOfThree($x));
    }

    public function isPowerOfThreeProviderTrue(): array
    {
        return [
            [1],
            [3],
            [9],
            [27],
            [81],
            [59049],
            [3486784401],
            [10460353203],
            [94143178827],
        ];
    }

    /**
     * @dataProvider isPowerOfThreeProviderFalse
     */
    public function testIsPowerOfThreeFalse(int $x): void
    {
        $this->assertFalse($this->ex8->isPowerOfThree($x));
    }

    public function isPowerOfThreeProviderFalse(): array
    {
        return [
            [0],
            [5],
            [6],
            [999999],
            [1234567890],
        ];
    }
}
