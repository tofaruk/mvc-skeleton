<?php

namespace Test;


use App\Shared\Welcome;
use PHPUnit\Framework\TestCase;

class WelcomeTest extends TestCase
{
    public function testGreeting()
    {
        $welcome = new Welcome();
        $actual = $welcome->greeting("Omar");
        $this->assertEquals('Welcome Omar',$actual);
    }
}