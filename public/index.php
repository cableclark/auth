<?php 
require __DIR__ . '/../src/bootstrap.php';

session_start();

//Define routes Routes
$router->get("/register", "Register", "index");

$router->post("/register", "Register", "store");

$router->get("/login", "Login", "index");

$router->post("/login", "Login", "login");

$router->get("/", function () {
    return view("index.view");
});

$path = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['__method'] ?? $_SERVER['REQUEST_METHOD'];

$router->handle($path, $method);



