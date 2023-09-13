<?php 
require __DIR__ . '/../src/bootstrap.php';


//Define routes Routes
$router->get("/register", "register/index");

$router->post("/register", "register/store");

$router->post("/login", "login/index");

$path = parse_url($_SERVER['REQUEST_URI'])['path'];


$router->handle($path);



