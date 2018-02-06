<?php

namespace Corp104\Support;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class GuzzleAwareTest extends TestCase
{
    /**
     * @test
     */
    public function shouldBeOkayWhenCallGetHttpClientWithSmokeTest()
    {
        $target = $this->getMockForTrait(GuzzleClientAwareTrait::class);

        $actual = $target->getHttpClient();

        $this->assertInstanceOf(Client::class, $actual);
    }

    /**
     * @test
     */
    public function shouldBeSameWhenCallSetAndGetHttpClientWithSmokeTest()
    {
        $excepted = $this->getMockBuilder(Client::class)->getMock();

        $target = $this->getMockForTrait(GuzzleClientAwareTrait::class);
        $target->setHttpClient($excepted);

        $actual = $target->getHttpClient();

        $this->assertSame($excepted, $actual);
    }
}
