<?php

namespace App\Controller;

use App\Core\BaseController;
use App\Core\Request;
use App\Core\View;
use App\Model\GreetingModel;

class GreetingController extends BaseController
{
    private $model = null;

    public function __construct()
    {
        $this->model = new GreetingModel();
    }

    public function indexAction($params = [], Request $request)
    {
        $greetings = $this->model->getAll();
        return View::render(['greetings' => $greetings]);
    }


    public function addAction($params = [], Request $request)
    {
        $postData = [
            'name' => $request->getPostData('name')
        ];
        if ($this->model->add($postData)) {
            $postData = [];
        }
        return View::render(['post_data' => $postData]);
    }

    public function oneAction($params = [], Request $request)
    {
        print_r([__METHOD__, $params]);
        return '';
    }

    public function twoAction($params = [], Request $request)
    {
        print_r([__METHOD__, $params]);
        return '';
    }
}