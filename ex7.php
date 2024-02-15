<?php

function fib(int $number): int
{
    return (int) (((((1 + sqrt(5)) / 2) ** $number) - (((1 - sqrt(5)) / 2) ** $number)) / sqrt(5));
}
