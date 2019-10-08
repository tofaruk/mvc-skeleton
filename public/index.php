<?php

use App\Config\Database;
use App\Shared\Greeting;
use App\Shared\Helper;

require __DIR__."/../vendor/autoload.php";

echo '<h2>Index file</h2>';
$db = Database::getInstance();
$greeting= new Greeting($db);
$helper = new Helper();
echo $greeting->welcome("Omar");
echo '<br>',$greeting->hi("Faruk");
echo '<br>',$greeting->hello("Asha");

$helper->pd($greeting->getAll("Asha"));
