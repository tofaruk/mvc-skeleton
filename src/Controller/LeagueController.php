<?php

namespace App\Controller;

use App\Core\BaseController;
use App\Core\Request;
use App\Core\View;

class LeagueController extends BaseController
{
    public function indexAction($prams =[],Request $request)
    {

        return View::render([
            'title'=> ' LeagueController',
            'welcome'=> 'Welcome to LeagueController',
        ],'index.html.twig');

    }

    public function teamAction($prams =[],Request $request)
    {
       return View::render([
            'team'=> 'Barcelona',
        ]);

    }
}