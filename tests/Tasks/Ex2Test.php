<?php

namespace Tests\Tasks;

use MyApp\Logger\FakeLogger;
use MyApp\Tasks\Ex2;
use PHPUnit\Framework\TestCase;

final class Ex2Test extends TestCase
{
    protected Ex2 $ex2;
    protected FakeLogger $logger;

    protected function setUp(): void
    {
        $this->logger = new FakeLogger();
        $this->ex2 = new Ex2($this->logger);
    }

    /**
     * @dataProvider isBalancedProvider
     */
    public function testIsBalanced(string $str, bool $expected): void
    {
        $this->assertEquals($expected, $this->ex2->isBalanced($str));

        if ($expected === true) {
            $this->assertEquals(
                "[INFO] The string $str is balanced",
                $this->logger->getLastMessage()
            );
        }

        if ($expected === false) {
            $this->assertEquals(
                "[INFO] The string $str is not balanced",
                $this->logger->getLastMessage()
            );
        }
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

    /**
     * @dataProvider isBalancedWrongInputProvider
     */
    public function testisBalancedWrongInput(string $str): void
    {
        try {
            $this->ex2->isBalanced($str);
        } catch (\Throwable $e) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
            $this->assertEquals('Wrong input data: brackets sequence expected', $e->getMessage());
        }
        $this->assertEquals(
            "[ERR] Wrong input data: brackets sequence expected",
            $this->logger->getLastMessage()
        );
    }

    public function isBalancedWrongInputProvider(): array
    {
        return [
            ['(341)'],
            ['32*(a$(())'],
            ['(sadавфа/a))'],
        ];
    }
}
