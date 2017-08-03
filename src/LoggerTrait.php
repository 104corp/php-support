<?php
namespace Corp104\Support;

use Psr\Log\LoggerAwareTrait;

trait LoggerTrait
{
    use LoggerAwareTrait;

    /**
     * Logging if logger exist
     *
     * @param int|string $level
     * @param string $message
     * @param array $context
     */
    protected function log($level, $message, array $context = [])
    {
        if (null !== $this->logger) {
            $this->logger->log($level, $message, $context);
        }
    }
}
