<?php

define('ROOT', dirname(__FILE__, 2));
define('APP_ROOT', dirname(__FILE__, 2) . "/app/");
define('PUBLIC_ROOT', dirname(__FILE__, 2) . "/public/");

require_once 'config.php';

// Autoloader
spl_autoload_register(function($className)
{
	require_once ROOT . "/{$className}.php";
});