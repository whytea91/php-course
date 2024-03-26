<?php

namespace MyApp\Tasks;

class Ex2
{
    public function isBalanced(string $brackets): bool
    {
        if ($brackets === '') {
            return true;
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
                return false;
            }
        }
        return $bracketsCounter === 0;
    }
}
