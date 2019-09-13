<?php

use App\System\Application;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once '../vendor/autoload.php';

$app = new Application();

$app->run();
