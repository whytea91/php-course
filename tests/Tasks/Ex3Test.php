<?php

namespace Tests\Tasks;

use MyApp\Tasks\Ex3;
use PHPUnit\Framework\TestCase;

final class Ex3Test extends TestCase
{
    protected Ex3 $ex3;

    protected function setUp(): void
    {
        $this->ex3 = new Ex3();
    }

    /**
     * @dataProvider isPerfectProvider
     */
    public function testIsPerfect(int $number, bool $expected): void
    {
        $this->assertEquals($expected, $this->ex3->isPerfect($number));
    }

    public function isPerfectProvider(): array
    {
        return [
            [6, true],
            [28, true],
            [496, true],
            [8128, true],
            [33550336, true],
            [8589869056, true],
            [137438691328, true],
            [5, false],
            [-1, false],
            [0, false],
            [8129, false],
            [33550337, false],
            [8589869057, false],
            [137438691329, false],
        ];
    }
}
