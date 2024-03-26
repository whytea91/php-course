<?php

namespace Tests;

use MyApp\Tasks\Ex2;
use PHPUnit\Framework\TestCase;

final class Ex2Test extends TestCase
{
    protected Ex2 $ex2;

    protected function setUp(): void
    {
        $this->ex2 = new Ex2();
    }

    /**
     * @dataProvider isBalancedProvider
     */
    public function testIsBalanced(string $str, bool $expected): void
    {
        $this->assertEquals($expected, $this->ex2->isBalanced($str));
    }

    public function isBalancedProvider(): array
    {
        return [
            ['()', true],
            ['(())', true],
            ['(()((((())))))', true],
            ['', true],
            ['((', false],
            ['())(', false],
            ['((())', false],
            ['(())())', false],
            ['(()(()))))',false],
            [')',false],
            ['())(()',false],
        ];
    }
}
