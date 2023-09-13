<?php

namespace App;

class Router {

    private $routes = [];

    public function handle ($uri, $args=[]) {


        foreach ($this->routes as $route) {
            
            if ($route["path"] === $uri && $_SERVER['REQUEST_METHOD'] == $route["method"] ) {

                $method = $route["method"];

                require (__DIR__ . '/Controllers/'. $route["controller"] . '.php');
                    
                return;
            
                }

            }

            require (__DIR__ . '/../views/index.view.php');

        }


        public function post ($route, $controller) {
            
            $route= $this->add('GET', $route, $controller);
                
            
            return $this;
            
        }

      
        public function get ($route, $controller) {
            
            $route= $this->add('GET', $route, $controller);
            
            return $this;
            
        }


        protected function add ($method, $path, $controller) {

            $route =   [
                'path' => $path,
                'controller' => $controller,
                'method'=> $method
            ];

            $this->routes[] = $route;
        }

    }