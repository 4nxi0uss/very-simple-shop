<?php

declare(strict_types=1);

use App\Classes\Tracer;

require(__DIR__ . '/../vendor/autoload.php');
// session_start();

echo ('hello world');

$tracer = new Tracer();


$tracer->tracer($_SERVER);
