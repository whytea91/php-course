<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use MyApp\Ex1;

final class Ex1Test extends TestCase
{
    protected Ex1 $ex1;

    protected function setUp(): void
    {
        $this->ex1 = new Ex1();
    }

    /**
     * @dataProvider binarySumWrongInputProvider
     */
    public function testBinarySumWrongInput(string $num1, string $num2): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Wrong input data');
        $this->ex1->binarySum($num1, $num2);
    }

    public function binarySumWrongInputProvider(): array
    {
        return [
            ['1', ''],
            ['', '1'],
            ['', ''],
            ['abc', 'dfg'],
        ];
    }

    /**
     * @dataProvider binarySumProvider
     */
    public function testBinarySum(string $num1, string $num2, string $expected): void
    {
        $this->assertEquals($expected, $this->ex1->binarySum($num1, $num2));
    }

    public function binarySumProvider(): array
    {
        $longNumber = '111111111111111111111111111111111111111111111111111111111110';
        $expectedLongNumber = '111111111111111111111111111111111111111111111111111111111111';
        return [
            ['10', '1', '11'],
            ['111', '1', '1000'],
            ['111', '10', '1001'],
            ['01', '001', '10'],
            [$longNumber, '1', $expectedLongNumber],
            ['0  1', ' 0 0  1  ', '10'],
        ];
    }
}
