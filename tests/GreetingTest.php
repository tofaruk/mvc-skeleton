<?php

namespace Test;


use App\Shared\Greeting;
use PHPUnit\Framework\TestCase;

class GreetingTest extends TestCase
{
    public function testWelcome()
    {
        $greeting = new Greeting();
        $actual = $greeting->welcome("Omar");
        $this->assertEquals('Welcome Omar', $actual);
    }

    public function testHello()
    {
        $greeting = new Greeting();
        $actual = $greeting->hello("Omar");
        $this->assertEquals('Hello Omar', $actual);
    }
}