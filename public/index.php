<?php
require __DIR__."/../vendor/autoload.php";

use App\Shared\Welcome;

$welcome = new Welcome();
echo $welcome->greeting("Omar");