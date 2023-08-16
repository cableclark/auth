<?php 



require __DIR__ . '/../src/bootstrap.php';


class Router {

    private $routes = [];


    public function handle ($uri) {
       

        

        foreach ($this->routes as $route) {
            
        
            if ($route["route"] === $uri) {

             require __DIR__ . '/../src/'. $route["route"] . '.php';
            }

        }


       

    }

    public function add ($route) {
       
        $this->routes[$route] = ["route" => $route];
        
        
    }

    public function post ($route) {

        $this->add($route);
       
        array_push($this->routes[$route], ["method"=>'post']);


        return $this;
        
    }

    public function get ($route) {

        $this->add($route);
       
        array_push($this->routes[$route], ["method"=>'get']);

        return $this;
        
    }

}
$router= new Router();

$router->post("/register");

$router->post("/login");

$router->handle($_SERVER['REQUEST_URI']);

require __DIR__ . '/../views/index.php';


