<?php

namespace MyApp\Tasks;

class Ex3
{
    public function isPerfect(int $number): bool
    {
        return in_array($number, [6, 28, 496, 8128, 33550336, 8589869056, 137438691328]);
    }
}
