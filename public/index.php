<?php 
require __DIR__ . '/../app/Router.php';
require __DIR__ . '/../src/bootstrap.php';



$router->post("/register");

$router->post("/login");

$router->handle($_SERVER['REQUEST_URI']);

require __DIR__ . '/../views/index.php';


