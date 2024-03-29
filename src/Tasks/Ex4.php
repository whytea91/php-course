<?php

namespace MyApp\Tasks;

class Ex4
{
    public function isHappy(string $ticket): bool
    {
        if ((strlen($ticket)) % 2 !== 0) {
            return false;
        }
        $leftPart = 0;
        for ($i = 0; $i < (strlen($ticket) / 2); $i++) {
            $leftPart += (int)$ticket[$i];
        }
        $rightPart = 0;
        for ($j = (strlen($ticket) / 2), $jMax = strlen($ticket); $j < $jMax; $j++) {
            $rightPart += (int)$ticket[$j];
        }
        return $leftPart === $rightPart;
    }
}
