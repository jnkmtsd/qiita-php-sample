<?php

declare(strict_types=1);

namespace Qps\Feature\DesignPattern\Decorator;

use GuzzleHttp\ClientInterface;

class ApiClientA
{
    private ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function request(): string
    {
        $response = $this->client->request('get', 'https://httpbin.org/get');

        return $response->getBody()->getContents();
    }
}
