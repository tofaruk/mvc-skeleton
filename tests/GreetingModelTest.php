<?php

namespace Test;

use PHPUnit\Framework\TestCase;

class GreetingModelTest extends TestCase
{
    public function testGetAll()
    {
        /** @var $statment|MockObject $statment */
        $statment = $this->createMock(\PDOStatement::class);
        $statment->method('fetchAll')->with(\PDO::FETCH_OBJ)->willReturn([]);

    }
}