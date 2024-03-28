<?php

namespace MyApp\Logger;

abstract class AbstractLogger implements LoggerInterface
{
    abstract protected function log(string $message): void;

    protected function logWithTimestamp(string $message): void
    {
        $timestamp = date('Y-m-d H:i:s');
        $this->log("[$timestamp] $message");
    }

    public function err(string $message): void
    {
        $this->logWithTimestamp('[ERR] ' . $message);
    }

    public function warn(string $message): void
    {
        $this->logWithTimestamp('[WARN] ' . $message);
    }

    public function info(string $message): void
    {
        $this->logWithTimestamp('[INFO] ' . $message);
    }
}
