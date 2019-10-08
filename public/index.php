<?php

use App\Shared\Helper;

require __DIR__."/../vendor/autoload.php";

echo '<h2>Index file</h2>';

$helper = new Helper();

$helper->pd('Omar', true);
$helper->pd(array("name"=>'Omar'));