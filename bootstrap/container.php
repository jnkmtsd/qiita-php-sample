<?php

declare(strict_types=1);

$c = new Illuminate\Container\Container();

$c->bind(
    \Qps\Feature\DesignPattern\Proxy\ApiClient::class,
    function () {
        $client = new \Qps\Feature\DesignPattern\Proxy\RetryableClient(new GuzzleHttp\Client());
        return new \Qps\Feature\DesignPattern\Proxy\ApiClient($client);
    }
);

return $c;
