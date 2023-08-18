<?php 
require __DIR__ . '/../app/Router.php';
require __DIR__ . '/../src/bootstrap.php';



//Define routes Routes
$router->post("/register");

$router->post("/login");

$path = parse_url($_SERVER['REQUEST_URI'])['path'];

$router->handle($path);



