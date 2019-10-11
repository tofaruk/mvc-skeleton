<?php

namespace App\Route;


use FastRoute\RouteCollector;

class Routes
{
    /** @var RouteCollector|null */
    public $routeCollector = null;

    public function __construct(RouteCollector $routeCollector)
    {
        $this->routeCollector = $routeCollector;
        $this->defineRoutes();
    }

    protected function defineRoutes()
    {
        $this->routeCollector->addGroup('/greeting', function (RouteCollector $r) {
            $r->addRoute('GET', '', 'App\Controller\GreetingController::indexAction');
            $r->addRoute('GET', '/one/{id:\d+}', 'App\Controller\GreetingController::oneAction');

            /** same action with different number of params  */
            $r->addRoute('GET', '/two/{id:.\d+}/{name:.*}', 'App\Controller\GreetingController::twoAction');
            $r->addRoute('GET', '/two/{id:.\d+}', 'App\Controller\GreetingController::twoAction');

        });

      /*          $this->routeCollector->addRoute('GET','/greeting/{id:.\d*}/{name:.*}','App\Controller\GreetingController::indexAction');
                $this->routeCollector->addRoute('GET','/greeting/hello/{id:\d*}/','App\Controller\GreetingController::helloAction');
      */
    }
}