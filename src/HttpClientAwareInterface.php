<?php

namespace Corp104\Support;

use GuzzleHttp\ClientInterface;

/**
 * Guzzle HTTP client aware interface
 */
interface HttpClientAwareInterface
{
    /**
     * Set the Guzzle HTTP client
     *
     * @param ClientInterface $httpClient
     */
    public function setHttpClient(ClientInterface $httpClient);

    /**
     * Set the Guzzle HTTP options
     *
     * @param array $httpOptions
     */
    public function setHttpOptions(array $httpOptions);
}
