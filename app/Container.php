<?php
namespace App;

use Exception;

class Container {

    private $container = [];

    public function bind ($classname, Callable $callback, array $args=[]) {
        
        if (!array_key_exists($classname, $this->container)){
        
            $this->container[$classname]['callback'] = $callback;

            $this->container[$classname]['args'] = $args;
            

        }

    }

    public function resolve ($key)  {
    
        if (array_key_exists($key, $this->container)){
        
            return call_user_func($this->container[$key]['callback'], $this->container[$key]['args'] );

        } else {

            throw new Exception("No such classname in the container");
        }

    }
}