<?php

use App\Router; 

const BASE_APP_DIR = __DIR__ . '/../';

spl_autoload_register(function ($class) {

    require  BASE_APP_DIR . $class . '.php';

});

require BASE_APP_DIR . 'App\helpers.php'; 

require BASE_APP_DIR . 'App\DatabaseProvider.php';

$database = $container->resolve('app\Database');

$router = new Router();