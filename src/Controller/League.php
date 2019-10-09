<?php

namespace App\Controller;


use App\Core\Template;

class League extends AbstractController
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