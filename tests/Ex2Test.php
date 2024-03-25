<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use MyApp\Ex2;

final class Ex2Test extends TestCase
{
    protected $ex2;

    protected function setUp(): void
    {
        $this->ex2 = new Ex2();
    }

    /**
     * @dataProvider isBalancedProviderTrue
     */
    public function testisBalancedTrue(string $str): void
    {
        $this->assertTrue($this->ex2->isBalanced($str));
    }

    public function isBalancedProviderTrue(): array
    {
        return [
            ['()'],
            ['(())'],
            ['(()((((())))))'],
            [''],
        ];
    }

    /**
     * @dataProvider isBalancedProviderFalse
     */
    public function testisBalancedFalse(string $str): void
    {
        $this->assertFalse($this->ex2->isBalanced($str));
    }

    public function isBalancedProviderFalse(): array
    {
        return [
            ['(('],
            ['())('],
            ['((())'],
            ['(())())'],
            ['(()(()))))'],
            [')'],
            ['())(()'],
        ];
    }
}
