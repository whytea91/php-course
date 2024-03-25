<?php

namespace MyApp;

class Ex1
{
    public function binarySum(string $one, string $two): string
    {
        if ($one === '' || $two === '') {
            throw new \InvalidArgumentException('Wrong input data');
        }
        $one = bindec($one);
        $two = bindec($two);
        $sum = $one + $two;
        $sum = decbin($sum);
        return $sum;
    }
}
