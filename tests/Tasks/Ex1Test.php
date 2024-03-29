<?php

namespace Tests\Tasks;

use MyApp\Logger\FakeLogger;
use MyApp\Tasks\Ex1;
use PHPUnit\Framework\TestCase;

final class Ex1Test extends TestCase
{
    protected Ex1 $ex1;
    protected FakeLogger $logger;

    protected function setUp(): void
    {
        $this->logger = new FakeLogger();
        $this->ex1 = new Ex1($this->logger);
    }

    /**
     * @dataProvider binarySumWrongInputProvider
     */
    public function testBinarySumWrongInput(string $num1, string $num2): void
    {
        try {
            $this->ex1->binarySum($num1, $num2);
        } catch (\Throwable $e) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
            $this->assertEquals('Wrong input data', $e->getMessage());
        }
        $this->assertEquals("[ERR] Wrong input data", $this->logger->getLastMessage());
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
        $this->assertEquals(
            "[INFO] Binary sum of $num1 and $num2 is $expected",
            $this->logger->getLastMessage()
        );
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
