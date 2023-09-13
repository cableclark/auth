<?php

use App\Router; 

const BASE_APP_DIR = __DIR__ . '/../';



require __DIR__ . '\..\vendor\autoload.php';


require BASE_APP_DIR . 'App\helpers.php'; 

require BASE_APP_DIR . 'App\DatabaseProvider.php';

spl_autoload_register(function ($class) {

    $class = str_replace("//", DIRECTORY_SEPARATOR, $class);

    if(class_exists($class)){

     require BASE_APP_DIR . $class . '.php';
    
    }

});

$database = $container->resolve('app\Database');

$router = new Router();