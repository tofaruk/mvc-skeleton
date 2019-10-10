<?php

namespace App\Controller;

use App\Core\Request;
use App\Core\View;

class League extends AbstractController
{
    public function indexAction(Request $request)
    {

        return View::render([
            'title'=> ' League',
            'welcome'=> 'Welcome to League',
        ],'index.html.twig');

    }

    public function teamAction(Request $request)
    {
       return View::render([
            'team'=> 'Barcelona',
        ]);

    }
}