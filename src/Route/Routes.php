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
        $r->addRoute('GET', '/', 'App\Controller\HomeController::indexAction');
        $r->addRoute('GET', '/home/json', 'App\Controller\HomeController::jsonAction');


        $r->addGroup('/post', function (RouteCollector $r) {
            $r->addRoute('GET', '', 'App\Controller\PostController::indexAction');
            $r->addRoute('GET', '/details/{id:\d+}', 'App\Controller\PostController::detailsAction');

        });


        $r->addGroup('/fake', function (RouteCollector $r) {
            $r->addRoute('GET', '', 'App\Controller\FakerController::indexAction');
            $r->addRoute('GET', '/post/add', 'App\Controller\FakerController::addPostAction');
            $r->addRoute('GET', '/comment/add', 'App\Controller\FakerController::addCommentAction');
        });
    }
}