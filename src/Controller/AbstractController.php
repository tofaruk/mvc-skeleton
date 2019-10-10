<?php

namespace App\Controller;


use App\Core\Request;

abstract class AbstractController
{
    abstract public function indexAction(Request $request);
}