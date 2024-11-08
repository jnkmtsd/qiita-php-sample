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

$c->bind(
    \Qps\Feature\DesignPattern\Decorator\AuthClient::class,
    function () {
        return new \Qps\Feature\DesignPattern\Decorator\AuthClient(
            new \GuzzleHttp\Client()
        );
    }
);
$c->bind(
    \Qps\Feature\DesignPattern\Decorator\ApiClientA::class,
    function (\Illuminate\Container\Container $c) {
        return new \Qps\Feature\DesignPattern\Decorator\ApiClientA(
            $c->make(\Qps\Feature\DesignPattern\Decorator\AuthClient::class)
        );
    }
);
$c->bind(
    \Qps\Feature\DesignPattern\Decorator\ApiClientB::class,
    function (\Illuminate\Container\Container $c) {
        return new \Qps\Feature\DesignPattern\Decorator\ApiClientB(
            $c->make(\Qps\Feature\DesignPattern\Decorator\AuthClient::class)
        );
    }
);

return $c;
