<?php
require __DIR__."/../vendor/autoload.php";

use App\Shared\Greeting;
echo '<h2>Greeting file</h2>';

$greeting= new Greeting();
echo $greeting->welcome("Omar");
echo '<br>',$greeting->hi("Faruk");
echo '<br>',$greeting->hello("Asha");