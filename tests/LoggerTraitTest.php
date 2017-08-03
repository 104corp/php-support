<?php
namespace Corp104\Support;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

/**
 * LoggerTrait test
 */
class LoggerTraitTest extends \PHPUnit_Framework_TestCase
{
    use LoggerTrait;

    /**
     * @test
     */
    public function shouldNotCallLoggerInstanceWhenNotSetLogger()
    {
        $logger = $this->getMockBuilder(LoggerInterface::class)
            ->getMock();

        $logger->expects($this->once())
            ->method('log');

        $this->setLogger($logger);
        $this->log(LogLevel::INFO, 'some-log');
    }
}
