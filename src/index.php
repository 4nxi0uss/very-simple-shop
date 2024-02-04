<?php

declare(strict_types=1);

use App\Classes\Test;
use App\Classes\Tracer;

require(__DIR__ . '/../vendor/autoload.php');

echo ('hello world');

$tracer = new Tracer();
$testT = new Test();

$testT->textTest('prosty test 1');
$tracer->trace($_SERVER);
$testT->textTest('prosty test 2');
