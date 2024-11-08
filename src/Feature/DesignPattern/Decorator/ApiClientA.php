<?php

declare(strict_types=1);

namespace Qps\Feature\DesignPattern\Decorator;

class ApiClientA
{
    private AuthClient $client;

    public function __construct(AuthClient $client)
    {
        $this->client = $client;
    }

    public function request(): string
    {
        $response = $this->client->authRequest('get', 'https://httpbin.org/get');

        return $response->getBody()->getContents();
    }
}
