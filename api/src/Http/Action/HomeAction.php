<?php

declare(strict_types=1);

namespace App\Http\Action;

use App\Http\SlimJsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use stdClass;

class HomeAction implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new SlimJsonResponse(new stdClass());
    }
}
