<?php

use App\Config\Database;
use App\Shared\Greeting;

require __DIR__."/../vendor/autoload.php";

echo '<h2>Index file</h2>';
$db = Database::getInstance();
$greeting= new Greeting($db);

echo $greeting->welcome("Omar");
echo '<br>',$greeting->hi("Faruk");
echo '<br>',$greeting->hello("Asha");
echo '<pre>';
print_r($greeting->getAll("Asha"));
echo '</pre>';