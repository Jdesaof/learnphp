<?php
namespace App;

class Router {
    private static $routes = [];
    public static function addRoute($path, $action) {
        $routes[] = ['path' => $path, 'action' => $action];
    }

    public static function getRoutes(){
        return self::$routes;
    }
public function __construct(private $path)
{

}
public function match() {
    foreach(self::$routes as $route) {
        if($route['path'] === $this->path) {
            return $route;
        }
    }
    return false;
}
}