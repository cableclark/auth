<?php

require __DIR__ . '/../app/Container.php';
require __DIR__ . '/../app/Database.php';
require __DIR__ . '/../app/helpers.php'; 
require __DIR__ . '/../app/DatabaseProvider.php';

$database = $container->resolve('app\Database');

$router = new Router();