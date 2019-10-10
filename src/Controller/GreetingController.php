<?php

namespace App\Controller;

use App\Core\BaseController;
use App\Core\Request;
use App\Core\View;
use App\Model\GreetingBaseModel;
class GreetingController extends BaseController
{
    private $model=null;

    public function __construct()
    {
        $this->model = new GreetingBaseModel();
    }
    public function indexAction(Request $request)
    {
        $greetings = $this->model->getAll();
        return View::render(['greetings'=>$greetings]);
    }
}