<?php

namespace App\Core;

use App\Core\Request;

abstract class BaseController
{
    private $model = null;

    abstract public function indexAction($params = [], Request $request);
}