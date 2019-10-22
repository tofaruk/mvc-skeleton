<?php

namespace Test;

use App\Core\RouteHandler;
use PHPUnit\Framework\TestCase;

class RouteHandlerTest extends TestCase
{

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