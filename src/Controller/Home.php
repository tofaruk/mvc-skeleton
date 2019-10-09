<?php

namespace App\Controller;


use App\Core\Template;

class Home extends AbstractController
{
    public function __construct()
    {
        // TODO Parent does not receive this depedency
        parent::__construct(new Template());
    }

    public function indexAction()
    {
        return parent::getView(
            __METHOD__,
            [
                'title'=> ' Home',
                'welcome'=> 'Welcome to Home',
            ]
        );
    }
}