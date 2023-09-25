<?php

namespace App;

class Application
{
    public static $container;

    public static function setContainer($container)
    {
        static::$container = $container;
    }

    public static function container($container)
    {
        return static::$container;
    }

    public static function getContainer()
    {
        if (isset(static::$container)) {
            return static::$container;
        }
    }
}
