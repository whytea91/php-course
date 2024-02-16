<?php

function isPowerOfThree(int $x): bool
{
    if ($x === 0) {
        return false;
    }
    while ($x % 3 === 0) {
        $x /= 3;
    }
    return $x === 1;
}
