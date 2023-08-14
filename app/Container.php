<?php
namespace App;

use Exception;

class Container {

    private $container = [];

    public function bind ($classname, $callback) {
        
        if (!array_key_exists($classname, $this->container)){
        
            $this->container[$classname] = $callback;

        }

    }

    public function resolve ($key)  {
    
        if (array_key_exists($key, $this->container)){
        
            return call_user_func($this->container[$key]);

        } else {

            throw new Exception("No such classname in the container");
        }

    }
}