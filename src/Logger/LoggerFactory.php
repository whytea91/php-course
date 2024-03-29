<?php

namespace MyApp\Logger;

class LoggerFactory
{
    public const LOGGER_KEY = 'logger';
    public const STDOUT_LOGGER = 'stdout';
    public const FILE_LOGGER = 'file';
    public const FILENAME_KEY = 'filename';
    private const LOGGER_TYPES = [self::STDOUT_LOGGER, self::FILE_LOGGER];
    private array $config;
    private ?LoggerInterface $logger = null;

    public function __construct(array $config)
    {
        $this->validateConfig($config);
        $this->config = $config;
    }

    private function validateConfig(array $config): void
    {
        if (!array_key_exists(self::LOGGER_KEY, $config)) {
            throw new \Exception(
                'The configuration is incorrect or missing: unable to find "' . self::LOGGER_KEY . '"'
            );
        }

        $loggerType = $config[self::LOGGER_KEY];
        if (!in_array($loggerType, self::LOGGER_TYPES)) {
            throw new \Exception('The configuration is incorrect: Logger type is incorrect');
        }

        if ($loggerType === self::FILE_LOGGER) {
            if (!array_key_exists(self::FILENAME_KEY, $config)) {
                throw new \Exception('The configuration is incorrect: "' . self::FILENAME_KEY . '" is missing');
            } elseif (empty($config[self::FILENAME_KEY])) {
                throw new \Exception('The configuration is incorrect: "' . self::FILENAME_KEY . '" is empty');
            }
        }
    }

    public function getLogger(): LoggerInterface
    {
        if ($this->logger === null) {
            $this->createLogger();
        }

        return $this->logger;
    }

    private function createLogger(): void
    {
        if ($this->config[self::LOGGER_KEY] === self::STDOUT_LOGGER) {
            $this->logger = new StdoutLogger();
        }
        if ($this->config[self::LOGGER_KEY] === self::FILE_LOGGER) {
            $filename = $this->config[self::FILENAME_KEY];
            $this->logger = new FileLogger($filename);
        }
    }
}
