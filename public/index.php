<?php 
require __DIR__ . '/../src/bootstrap.php';

session_start();
//Define routes Routes
$router->get("/register", "register/index");

$router->post("/register", "register/store");

$router->get("/login", "login/index");

$router->post("/login", "login/login");

$path = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['__method'] ?? $_SERVER['REQUEST_METHOD'];

$router->handle($path, $method);



