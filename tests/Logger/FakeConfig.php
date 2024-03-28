<?php

namespace Tests\Logger;

class FakeConfig
{
    private array $config;

    protected function config(array $config): void
    {
        $this->config = $config;
    }

    public function getConfig(): array
    {
        return $this->config;
    }
}
