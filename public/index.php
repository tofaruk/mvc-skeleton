<?php

use App\Core\Request;

require __DIR__ . "/../config/config.php";
require __DIR__ . "/../vendor/autoload.php";
use App\Route\Routes as AppRoutes;
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $appRoutes = new AppRoutes($r);
});


// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
print_r($routeInfo);
$request = new Request($_SERVER, $_POST, $_GET, $_FILES);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        list($controller, $method) = explode("::",$handler);
        $controller = new $controller;
        echo $controller->$method($vars, $request);
        break;
}



$request = new Request($_SERVER, $_POST, $_GET, $_FILES);

/*try {
    $controller = $request->getController();
    $method = $request->getMethod($controller);
    $controller = new $controller;
    echo $controller->$method($request);
} catch (Exception $exception) {
    echo sprintf('<h3>%s</h3><h4>%s</h4><h5>%s:%s</h5>',
        $exception->getCode(),
        $exception->getMessage(),
        $exception->getFile(),
        $exception->getLine()
    );
}*/