<?php

namespace App;
class Router {

    private $routes = [];


    public function handle ($uri, $args=[]) {
      
      

        foreach ($this->routes as $route) {
            
        
            if ($route["route"] === $uri) {
                

                require (__DIR__ . '/Controllers'. $route["route"] . '.php');
                
                return;
           
            }


        }

        require (__DIR__ . '/../views/index.view.php');
       

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