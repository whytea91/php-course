<?php

use MyApp\Logger\StdoutLogger;
use MyApp\Tasks\Ex1;
use MyApp\Tasks\Ex2;
use MyApp\Tasks\Ex3;
use MyApp\Tasks\Ex4;
use MyApp\Tasks\Ex5;
use MyApp\Tasks\Ex6;
use MyApp\Tasks\Ex7;
use MyApp\Tasks\Ex8;

require_once __DIR__ . '/vendor/autoload.php';

echo 'Binary Sum: ' .PHP_EOL;
echo (new Ex1()->binarySum('91', '0000111'), PHP_EOL;
echo "\n";

echo 'The string of brackets is or is not balanced: ' .PHP_EOL;
echo (new Ex2())->isBalanced('((())') ? 'balanced' : 'not balanced', PHP_EOL;
echo "\n";

echo 'The number is or is not perfect: ' .PHP_EOL;
echo (new Ex3())->isPerfect(7) ? 'The number is perfect' : 'The number is not perfect', PHP_EOL;
echo "\n";

echo 'The ticker is or is not happy: ' .PHP_EOL;
echo (new Ex4())->isHappy( '9873242984') ? 'The ticket is happy' : 'The ticket is not happy', PHP_EOL;
echo "\n";

echo 'The row from $begin to $end is transformed to: ' .PHP_EOL;
(new Ex5())->fizzBuzz(1, 10) .PHP_EOL;
echo "\n";
echo "\n";

echo 'We sum all digits from $number till there is only one digit: ' .PHP_EOL;
echo (new Ex6())->addDigits(12345) , PHP_EOL;
echo "\n";

echo 'For $number in the fibonachi sequence is: ' .PHP_EOL;
echo (new Ex7())->fib(52), PHP_EOL;
echo "\n";

echo 'It the number power of 3? ' .PHP_EOL;
echo (new Ex8())->isPowerOfThree(432) ? 'Yes' : 'No', PHP_EOL;
echo "\n";
