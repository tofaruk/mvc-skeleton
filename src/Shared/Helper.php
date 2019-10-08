<?php

namespace App\Shared;


class Helper
{
    public function pd($data = array(), $die = false)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        if ($die) die('pd()');
    }
}