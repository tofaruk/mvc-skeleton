<?php
define('APP_NAME', 'Simple MVC Framework');
define('APP_HOST_NAME', 'http://localhost:8080');
define('APP_INNER_DIRECTORY', '/raw-to-advance-php');
define('APP_ROOT', __DIR__ . '/../src');
define('APP_VAR', APP_ROOT . '/../var');

define('APP_CONTROLLER_NAMESPACE', 'App\\Controller\\');
define('APP_DEFAULT_CONTROLLER', 'HomeController');
define('APP_DEFAULT_CONTROLLER_METHOD', 'index');
define('APP_CONTROLLER_METHOD_SUFFIX', 'Action');
define('APP_CONTROLLER_SUFFIX', 'Controller');
define('APP_Model_SUFFIX', 'Model');
define('TWIG_DEBUG', false);

define('DB_HOST', '');
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASS', '');