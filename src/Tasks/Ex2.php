<?php

namespace MyApp\Tasks;

use MyApp\Logger\LoggerInterface;

class Ex2
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function isBalanced(string $brackets): bool
    {
        if ($brackets === '') {
            $this->logger->info("The string $brackets is balanced");
            return true;
        }

        $cleaned = preg_replace('/[^\(\)\[\]\{\}]/', '', $brackets);
        if ($cleaned !== $brackets) {
            $this->logger->err('Wrong input data: brackets sequence expected');
            throw new \InvalidArgumentException('Wrong input data: brackets sequence expected');
        }

        $bracketsCounter = 0;
        for ($i = 0, $iMax = strlen($brackets); $i < $iMax; $i++) {
            if ($brackets[$i] === '(') {
                ++$bracketsCounter;
            }
            if ($brackets[$i] === ')') {
                --$bracketsCounter;
            }
            if ($bracketsCounter < 0) {
                $this->logger->info("The string $brackets is not balanced");
                return false;
            }
        }

        if ($bracketsCounter === 0) {
            $this->logger->info("The string $brackets is balanced");
            return true;
        }

        $this->logger->info("The string $brackets is not balanced");
        return false;
    }
}
