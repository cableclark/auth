<?php

if (!function_exists('dd')) {

    function dd ($arg) {
        echo "<pre>"; 
        var_dump ($arg);
        echo "</pre>"; 
        die();
    }

}


