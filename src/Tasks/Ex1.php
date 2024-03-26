<?php

namespace MyApp\Tasks;

use MyApp\Logger\StdoutLogger;

class Ex1
{
    private $logger;

    public function __constract(StdoutLogger $logger)
    {
        $this->logger = $logger;
    }

    public function binarySum(string $one, string $two): string
    {
        // Remove any whitespace characters from the input strings
        $one = preg_replace('/\s+/', '', $one);
        $two = preg_replace('/\s+/', '', $two);

        // Check if the input strings contain only zeroes and/or ones
        if (!preg_match('/^[01]+$/', $one) || !preg_match('/^[01]+$/', $two)) {
            $this->logger->log('Wrong input data');
            throw new \InvalidArgumentException('Wrong input data');
        }

        $one = bindec($one);
        $two = bindec($two);
        $sum = $one + $two;
        $sum = decbin($sum);
        return $sum;
    }
}
