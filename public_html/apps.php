<?php

ini_set('display_errors', 1);
session_start();

include '../app/config/global.php';
include '../app/config/database.php';
include '../app/core/autoloader.php';

use Webhade\core\Router;

$web = new Router;
$web->parse();
