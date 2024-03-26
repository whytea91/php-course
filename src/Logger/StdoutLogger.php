<?php

namespace MyApp\Logger;

class StdoutLogger
{
    public function log(string $message): void
    {
        echo $message . PHP_EOL;
    }
}
