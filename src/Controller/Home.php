<?php

namespace App\Controller;

use App\Core\Request;
use App\Core\View;

class Home extends AbstractController
{
    public function indexAction(Request $request)
    {
        return View::render();
    }

    public function productsAction(Request $request)
    {
        $products = [
            [
                'name' => 'Notebook',
                'description' => 'Core i7',
                'value' => 800.00,
                'date_register' => '2017-06-22',
            ],
            [
                'name' => 'Mouse',
                'description' => 'Razer',
                'value' => 125.00,
                'date_register' => '2017-10-25',
            ],
            [
                'name' => 'Keyboard',
                'description' => 'Mechanical Keyboard',
                'value' => 250.00,
                'date_register' => '2017-06-23',
            ],
        ];

        return View::render(['products'=>$products],'products.html.twig',);
    }
}