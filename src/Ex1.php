<?php

namespace MyApp;

class Ex1
{
    public function binarySum(string $one, string $two): string
    {
        $one = bindec($one);
        $two = bindec($two);
        $sum = $one + $two;
        $sum = decbin($sum);
        return $sum;
    }
}
