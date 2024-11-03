<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';
$c = require __DIR__ . '/../bootstrap/container.php';

$apiClient = $c->make(\Qps\Feature\DesignPattern\Proxy\ApiClient::class);
var_dump($apiClient->request());
