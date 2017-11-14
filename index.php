<?php

include 'app/core/autoloader.php';

use Webhade\controller\HomeController;

$web = new HomeController;
$web->index();