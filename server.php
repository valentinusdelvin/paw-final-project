<?php

use LaravelVercel\Runtime\VercelRuntime;

$app = require __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

(new VercelRuntime)->run($app, $kernel);
