<?php

use App\Core\Request;

require __DIR__ . "/../config/config.php";
require __DIR__ . "/../vendor/autoload.php";

$request = new Request($_SERVER, $_POST, $_GET, $_FILES);

try {
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
}