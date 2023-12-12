<?php

namespace Test\Unit\Http;

use App\Http\SlimJsonResponse;
use JsonException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Http\SlimJsonResponse
 *
 * @internal
 */
class SlimJsonResponseTest extends TestCase
{
    /**
     * @throws JsonException
     */
    public function testInt()
    {
        $response = new SlimJsonResponse(12);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('12', $response->getBody()->getContents());
    }
}