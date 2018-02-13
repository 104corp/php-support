<?php

namespace Corp104\Support;

/**
 * The Trait has Guzzle HTTP options
 */
trait HttpOptionsAwareTrait
{
    /**
     * @var array
     */
    protected $httpOptions;

    /**
     * @return array
     */
    public function getHttpOptions()
    {
        return $this->httpOptions;
    }

    /**
     * Implements set the HTTP options
     *
     * @param array $httpOptions
     */
    public function setHttpOptions(array $httpOptions)
    {
        $this->httpOptions = $httpOptions;
    }
}
