<?php

namespace MyApp;

class Ex6
{
    public function addDigits(int $number): int
    {
        $string = (string) $number;
        while (strlen($string) > 1) {
            $resSum = 0;
            for ($i = 0, $iMax = strlen($string); $i < $iMax; $i++) {
                $curChar = $string[$i];
                $resSum += (int) $curChar;
            }
            $string = (string) $resSum;
        }
        return (int) $string;
    }
}
