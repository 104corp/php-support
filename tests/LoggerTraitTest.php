<?php

namespace Corp104\Support;

use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

/**
 * LoggerTrait test
 */
class LoggerTraitTest extends TestCase
{
    use LoggerTrait;

    /**
     * @test
     */
    public function shouldNotCallLoggerInstanceWhenNotSetLogger()
    {
        $logger = $this->createMock(LoggerInterface::class);

        $logger->expects($this->once())
            ->method('log');

        $this->setLogger($logger);
        $this->log(LogLevel::INFO, 'some-log');
    }
}
