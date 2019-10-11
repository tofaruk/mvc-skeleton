<?php

namespace App\Core;


class RouteHandler
{
    public static function found($routeInfo, Request $request)
    {
        $handler = $routeInfo[1];
        if ($handler instanceof \Closure) {
            return $handler();
        }
        $vars = $routeInfo[2];
        list($controller, $method) = explode("::", $handler);
        $controller = new $controller;
        return $controller->$method($vars, $request);
    }

    public static function notFound()
    {
        return '<h2>404 Not Found</h2>';
    }

    public static function methodNotAllowed($allowedMethods)
    {
        return '<h2> 405 Method Not Allowed</h2>';
    }
}