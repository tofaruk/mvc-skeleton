<?php

namespace App\Controller;


use App\Core\Template;

class League extends AbstractController
{
    public function __construct()
    {
       parent::__construct();
    }

    public function indexAction()
    {
        return parent::getView(
            __METHOD__,
            [
                'title'=> ' League',
                'welcome'=> 'Welcome to League',
            ]
        );
    }

    public function teamAction()
    {
        return parent::getView(
            __METHOD__,
            [
                'team'=> 'Barcelona',
            ]
        );
    }
}