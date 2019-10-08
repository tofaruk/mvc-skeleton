<?php

namespace App\Shared;


class Welcome
{
    public function greeting($name=null)
    {
        return "Welcome ".$name;
    }
}