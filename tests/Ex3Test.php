<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use MyApp\Ex3;

final class Ex3Test extends TestCase
{
    protected $ex3;

    protected function setUp(): void
    {
        $this->ex3 = new Ex3();
    }

    /**
     * @dataProvider isPerfectProviderTrue
     */
    public function testIsPerfectTrue(int $number): void
    {
        $this->assertTrue($this->ex3->isPerfect($number));
    }

    public function isPerfectProviderTrue(): array
    {
        return [
            [6],
            [28],
            [496],
            [8128],
            [33550336],
            [8589869056],
            [137438691328],
        ];
    }

    /**
     * @dataProvider isPerfectProviderFalse
     */
    public function testIsPerfectFalse(int $number): void
    {
        $this->assertFalse($this->ex3->isPerfect($number));
    }

    public function isPerfectProviderFalse(): array
    {
        return [
            [5],
            [-1],
            [0],
            [8129],
            [33550337],
            [8589869057],
            [137438691329],
        ];
    }
}
