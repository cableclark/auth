<?php

if (!function_exists('dd')) {

    function dd ($arg) {
        echo "<pre>"; 
        var_dump ($arg);
        echo "</pre>"; 
        die();
    }
    
}


if (!function_exists('view')) {

    function view ($view, $args = []) {

        extract($args);

        require (__DIR__ . '/../views/'. $view . '.php');

    }
    
}