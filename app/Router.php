<?php
//Make the router object oriented
namespace App;

class Router
{
    public $routes = [];

    public function handle($uri, $method)
    {
        
        
        foreach ($this->routes as $route) {

            if ($route['path'] === $uri && $method == strtoupper($route['method'])) {

               
                //Call the function with arguments 
                if ( is_callable($route['controller']) ) {
                    call_user_func($route['controller']);
                }   

                //Instatiate a Controller class and call the action on it

                $action = $route['action'];

                $class =  "App\Controller\\". $route['controller'];

            
                if (class_exists($class)) {
                    
                    if (method_exists($class, $action)) {
                
                        return (new $class)->$action(); 

                    }
                } 
            }
        }

        $this->returnToHome();
      
    }

    public function post($route, $controller, $action ="")
    {
        $route = $this->add('POST', $route, $controller, $action);

           return $this;
    }

    public function get($route, $controller, $action ="")
    {
        $route = $this->add('GET', $route, $controller, $action);

        return $this;
    }

    public function delete($route, $controller, $action ="")
    {
        $route = $this->add('DELETE', $route, $controller, $action);

        return $this;
     }

    public function put($route, $controller, $action ="")
    {
        $route = $this->add('PUT', $route, $controller, $action);

        return $this;
    }

    public function PATCH($route, $controller, $action ="")
    {
        $route = $this->add('PATCH', $route, $controller, $action);

        return $this;
    }

    protected function add($method, $path, $controller, $action="" )
    {
        $route = [
            'path' => $path,
            'controller' => $controller,
            'method' => $method,
            'action' => $action,
        ];

        $this->routes[] = $route;
    }

    protected function returnToHome() {

        header("HTTP/1.1 404 Not Found");
        require __DIR__.'/../views/index.view.php';
        die (); 

    }
}
