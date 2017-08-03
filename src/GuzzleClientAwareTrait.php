<?php
namespace Corp104\Support;

use GuzzleHttp\Client;

/**
 * The Trait Implements GuzzleClientAwareInterface
 */
trait GuzzleClientAwareTrait
{
    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * Implements get the Guzzle Client.
     *
     * @param array $config
     * @return Client
     */
    public function getHttpClient(array $config = [])
    {
        if (null === $this->httpClient) {
            $this->httpClient = new Client($config);
        }

        return $this->httpClient;
    }

    /**
     * Implements set the HTTP Client.
     *
     * @param Client $httpClient
     */
    public function setHttpClient(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }
}
