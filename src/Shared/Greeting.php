<?php
namespace App\Shared;


class Greeting
{
    public function welcome($name=null)
    {
        return "Welcome ".$name;
    }

    public function hello($name=null)
    {
        return "Hello ".$name;
    }

    public function hi($name=null)
    {
        return "Hi ".$name;
    }
}