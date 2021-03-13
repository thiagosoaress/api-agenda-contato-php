<?php

use \Slim\App;

if (PHP_SAPI == 'cli-server') {
    $file = __DIR__ . $_SERVER['REQUEST_URI'];
    if(is_file($file)) {
        return false;
    }
}

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/environment.php';

$settings = require __DIR__.'/src/settings.php';
$app = new App($settings);

require __DIR__.'/src/middleware.php';

require __DIR__.'/src/routes.php';

$app->run();
