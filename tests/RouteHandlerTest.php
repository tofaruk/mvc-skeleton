<?php

namespace Test;


use App\Core\Request;
use App\Core\RouteHandler;
use PHPUnit\Framework\TestCase;

class RouteHandlerTest extends TestCase
{

    public function testFound()
    {
      //  $arr = Array ( [0] => 1 [1]=> "App\Controller\HomeController::indexAction" [2]=> Array () );
        $arr=[
            1,
            "App\Controller\HomeController::indexAction",
            []
        ];


        $request = $this->createMock(Request::class);
        $actual = RouteHandler::found($arr,$request);
        $this->assertEquals('<h2>404 Not Found</h2>', $actual);
    }


    public function testNotFound()
    {
        $actual = RouteHandler::notFound();
        $this->assertEquals('<h2>404 Not Found</h2>', $actual);
    }

    public function testMethodNotAllowed()
    {
        $actual = RouteHandler::methodNotAllowed(2);
        $this->assertEquals('<h2> 405 Method Not Allowed</h2>', $actual);
    }
}