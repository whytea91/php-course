<?php

namespace MyApp;

class Ex1
{
    public function binarySum(string $one, string $two): string
    {
        // Remove any whitespace characters from the input strings
        $one = preg_replace('/\s+/', '', $one);
        $two = preg_replace('/\s+/', '', $two);

        // Check if the input strings contain only zeroes and/or ones
        if (!preg_match('/^[01]+$/', $one) || !preg_match('/^[01]+$/', $two)) {
            throw new \InvalidArgumentException('Wrong input data');
        }

        $one = bindec($one);
        $two = bindec($two);
        $sum = $one + $two;
        $sum = decbin($sum);
        return $sum;
    }
}
