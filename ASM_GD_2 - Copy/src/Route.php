<?php

namespace App;

class Route{
    
    private static $routes = [];

    public static function get($url, $controllerMethod){
        self::$routes[$url] = $controllerMethod;
    }

    public static function dispatch($url){
        if(array_key_exists($url, self::$routes)){
            $controllerMethod = self::$routes[$url];
            list($controller, $method) = explode("@", $controllerMethod);
            
            $controllerInstance = new $controller();
            $controllerMethod = $controllerInstance->$method();

        }else{
            echo "<h2>404 NOT FOUND</h2>";
        }
    }
}