<?php

namespace App\Http;

use Fig\Http\Message\StatusCodeInterface;
use Psr\Http\Message\StreamInterface;
use Slim\Psr7\Factory\StreamFactory;
use Slim\Psr7\Headers;
use Slim\Psr7\Interfaces\HeadersInterface;
use Slim\Psr7\Response;

class SlimJsonResponse extends Response
{
    /**
     * @throws \JsonException
     */
    public function __construct($data, int $status = 200)
    {
        parent::__construct(
            $status,
            new Headers(['Content-Type' => 'application/json']),
            (new StreamFactory())->createStream(json_encode($data, JSON_THROW_ON_ERROR))
        );
    }
}