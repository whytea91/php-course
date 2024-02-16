<?php

function fizzBuzz(int $begin, int $end): void
{
    $result = '';
    if ($begin > $end) {
        print_r($result);
        return;
    }
    for ($i = $begin; $i <= $end; $i++) {
        if (($i % 3 === 0) && ($i % 5 === 0)) {
            $result .= ' FizzBuzz';
        } elseif ($i % 3 === 0) {
            $result .= ' Fizz';
        } elseif ($i % 5 === 0) {
            $result .= ' Buzz';
        } else {
            $result .= ' ' . $i;
        }
    }
    print_r(trim($result));
}
