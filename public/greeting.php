<?php
require __DIR__."/../vendor/autoload.php";

use App\Config\Database;
use App\Shared\Greeting;
echo '<h2>GreetingModel file</h2>';

$db = Database::getInstance();
$greeting= new Greeting($db);

var_dump($greeting->getAll("Asha"));

echo $greeting->welcome("Omar");
echo '<br>',$greeting->hi("Faruk");
echo '<br>',$greeting->hello("Asha");