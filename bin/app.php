<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';
$c = require __DIR__ . '/../bootstrap/container.php';

$apiClientA = $c->make(\Qps\Feature\DesignPattern\Decorator\ApiClientA::class);
$apiClientB = $c->make(\Qps\Feature\DesignPattern\Decorator\ApiClientA::class);
var_dump($apiClientA->request());
var_dump($apiClientB->request());
