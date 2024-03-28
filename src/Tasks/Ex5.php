<?php

namespace MyApp\Tasks;

class Ex5
{
    public function fizzBuzz(int $begin, int $end): void
    {
        echo $this->fizzBuzzGenerate($begin, $end);
    }
    public function fizzBuzzGenerate(int $begin, int $end): string
    {
        $result = '';
        if ($begin > $end) {
            return $result;
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
        return trim($result);
    }
}
