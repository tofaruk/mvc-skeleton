<?php

namespace App\Controller;

use App\Core\BaseController;
use App\Core\Request;
use App\Core\View;
use App\Model\GreetingBaseModel;

class GreetingController extends BaseController
{
    private $model = null;

    public function __construct()
    {
        $this->model = new GreetingBaseModel();
    }

    public function indexAction($params=[], Request $request)
    {
        $greetings = $this->model->getAll();
        return View::render(['greetings' => $greetings]);
    }

    public function oneAction($params=[], Request $request)
    {
        print_r([__METHOD__,$params]);
       return '';
    }

    public function twoAction($params=[], Request $request)
    {
        print_r([__METHOD__,$params]);
        return '';
    }
}