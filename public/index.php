<?php 
require __DIR__ . '/../src/bootstrap.php';

//Define routes Routes
$router->get("/register", "register/index");

$router->post("/register", "register/store");

$router->post("/login", "login/index");

$path = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['__method'] ?? $_SERVER['REQUEST_METHOD'];

$router->handle($path, $method);



