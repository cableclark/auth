<?php

if (!function_exists('dd')) {
    function dd($arg)
    {
        echo '<pre>';
        var_dump($arg);
        echo '</pre>';
        exit;
    }
}

if (!function_exists('view')) {
    function view($view, $args = [])
    {
        extract($args);
    
        require __DIR__.'/../views/'.$view.'.php';
    }
}

if (!function_exists('displayErrors')) {
    function displayErrors($type)
    {
            foreach ($type as $error) {
                echo "<div class='text-red-200'>$error</div>";
            }
    }
}
