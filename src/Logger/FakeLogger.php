<?php

namespace MyApp\Logger;

class FakeLogger extends AbstractLogger
{
    private string $lastMessage;

    protected function log(string $message): void
    {
        $this->lastMessage = $message;
    }

    public function getLastMessage(): string
    {
        return $this->lastMessage;
    }

    protected function logWithTimestamp(string $message): void
    {
        $this->log($message);
    }
}
