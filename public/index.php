<?php

use App\Core\Request;

require __DIR__ . "/../config/config.php";
require __DIR__ . "/../vendor/autoload.php";

use App\Route\Routes as AppRoutes;
use App\Core\RouteHandler;

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    AppRoutes::defineRoutes($r);
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
$request = new Request($_SERVER, $_POST, $_GET, $_FILES);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo RouteHandler::notFound();
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        echo RouteHandler::methodNotAllowed($routeInfo[1]);
        break;
    case FastRoute\Dispatcher::FOUND:
        echo RouteHandler::found($routeInfo, $request);
        break;
}