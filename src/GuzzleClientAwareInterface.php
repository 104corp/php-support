<?php

namespace Corp104\Support;

use GuzzleHttp\Client;

/**
 * Guzzle client
 */
interface GuzzleClientAwareInterface
{
    /**
     * Set the Guzzle Client.
     *
     * @param Client $client
     */
    public function setHttpClient(Client $client);
}
