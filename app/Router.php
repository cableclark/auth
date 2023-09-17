<?php

namespace App;

class Router {

    public $routes = [];


    public function handle ($uri, $method, $args=[]) {

        foreach ($this->routes as $route) {
            
            if ($route["path"] === $uri && $method == strtoupper($route["method"]) ) {

                $method = $route["method"];

                require (__DIR__ . '/Controllers/'. $route["controller"] . '.php');
                    
                return;
            
                }

            }

            require (__DIR__ . '/../views/index.view.php');

        }


        public function post ($route, $controller) {
            
            $route= $this->add('POST', $route, $controller);
            
            return $this;
            
        }

      
        public function get ($route, $controller) {
            
            $route= $this->add('GET', $route, $controller);
            
            return $this;
            
        }


        public function delete ($route, $controller) {
            
            $route= $this->add('DELETE', $route, $controller);
            
            return $this;
            
        }

        public function put ($route, $controller) {
            
            $route= $this->add('PUT', $route, $controller);
            
            return $this;
            
        }


        public function PATCH ($route, $controller) {
            
            $route= $this->add('PATCH', $route, $controller);
            
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