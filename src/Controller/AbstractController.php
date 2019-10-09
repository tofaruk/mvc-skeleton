<?php

namespace App\Controller;


use App\Core\Template;

class AbstractController
{
    private $template;

    public function __construct()
    {
        $this->template = new Template();
    }

    protected function getView($controller, array $variables = [])
    {
        // TODO not defined this method
        //
        return $this->template->getView($controller, $variables);
    }
}