<?php

namespace App\Route;


use FastRoute\RouteCollector;

class Routes
{
    /**
     * @param RouteCollector $r
     */
    public static function defineRoutes(RouteCollector $r)
    {
        $r->addGroup('/greeting', function (RouteCollector $r) {
            $r->addRoute('GET', '', 'App\Controller\GreetingController::indexAction');
            $r->addRoute('GET', '/one/{id:\d+}', 'App\Controller\GreetingController::oneAction');

            /** same action with different number of params  */
            $r->addRoute('GET', '/two/{id:.\d+}/{name:.*}', 'App\Controller\GreetingController::twoAction');
            $r->addRoute('GET', '/two/{id:.\d+}', 'App\Controller\GreetingController::twoAction');

        });

        $r->addRoute('GET', '/tata', 'App\Controller\HomeController::index22Action');
        $r->addRoute('GET', '/home', 'App\Controller\HomeController::indexAction');
        $r->addRoute('GET', '/home/products', 'App\Controller\HomeController::productsAction');

        $r->addRoute('GET', '/home/product', function () {
            return 'i am from a Closure : Under construction ';
        });


        $r->addGroup('/league', function (RouteCollector $r) {
            $r->addRoute('GET', '', 'App\Controller\LeagueController::indexAction');
            $r->addRoute('GET', '/team', 'App\Controller\LeagueController::teamAction');
        });

    }
}