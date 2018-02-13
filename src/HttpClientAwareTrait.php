<?php

namespace Corp104\Support;

use GuzzleHttp\ClientInterface;

/**
 * The Trait Implements HttpClientAwareInterface
 */
trait HttpClientAwareTrait
{
    use HttpOptionsAwareTrait;

    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * @return ClientInterface
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * Implements set the HTTP client
     *
     * @param ClientInterface $httpClient
     */
    public function setHttpClient(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }
}
