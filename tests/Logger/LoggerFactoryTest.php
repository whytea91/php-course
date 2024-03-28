<?php

namespace Tests\Logger;

use PHPUnit\Framework\TestCase;
use MyApp\Logger\LoggerFactory;

final class LoggerFactoryTest extends TestCase
{
    protected LoggerFactory $loggerFactory;

    /**
     * @dataProvider getLoggerNoLoggerKeyProvider
     */
    public function testGetLoggerNoLoggerKey(array $config): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage(
            'The configuration is incorrect or missing: unable to find "' . LoggerFactory::LOGGER_KEY . '"'
        );
        $this->loggerFactory = new LoggerFactory($config);
        $this->loggerFactory->getLogger();
    }

    public function getLoggerNoLoggerKeyProvider(): array
    {
        return [
            [['lo12gger' => 'sfsdfsdf']],
            [['logg5er' => '32*(a$(())', 'filename' => 'example.log']],
            [['logg31er' => '(sadавфа/a))', 'fi3lename' => 'example.log']],
        ];
    }

    /**
     * @dataProvider getLoggerBadLoggerTypeProvider
     */
    public function testGetLoggerBadLoggerType(array $config): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('The configuration is incorrect: Logger type is incorrect');
        $this->loggerFactory = new LoggerFactory($config);
        $this->loggerFactory->getLogger();
    }

    public function getLoggerBadLoggerTypeProvider(): array
    {
        return [
            [[LoggerFactory::LOGGER_KEY => 'sfsdfsdf']],
            [[LoggerFactory::LOGGER_KEY => '32*(a$(())', 'filename' => 'example.log']],
            [[LoggerFactory::LOGGER_KEY => '(sadавфа/a))', 'fi3lename' => 'example.log']],
        ];
    }

    /**
     * @dataProvider getLoggerNoFilenameKeyProvider
     */
    public function testGetLoggerNoFilenameKey(array $config): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage(
            'The configuration is incorrect: "' . LoggerFactory::FILENAME_KEY . '" is missing'
        );
        $this->loggerFactory = new LoggerFactory($config);
        $this->loggerFactory->getLogger();
    }

    public function getLoggerNoFilenameKeyProvider(): array
    {
        return [
            [[LoggerFactory::LOGGER_KEY => LoggerFactory::FILE_LOGGER]],
            [[LoggerFactory::LOGGER_KEY => LoggerFactory::FILE_LOGGER, 'fsadme' => 'example.log']],
            [[LoggerFactory::LOGGER_KEY => LoggerFactory::FILE_LOGGER, 'fi3lename' => 'example.log']],
        ];
    }

    /**
     * @dataProvider getLoggerFilenameKeyIsEmptyProvider
     */
    public function testGetLoggerFilenameKeyIsEmpty(array $config): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage(
            'The configuration is incorrect: "' . LoggerFactory::FILENAME_KEY . '" is empty'
        );
        $this->loggerFactory = new LoggerFactory($config);
        $this->loggerFactory->getLogger();
    }

    public function getLoggerFilenameKeyIsEmptyProvider(): array
    {
        return [
            [[LoggerFactory::LOGGER_KEY => LoggerFactory::FILE_LOGGER, LoggerFactory::FILENAME_KEY => '']],
        ];
    }
}
