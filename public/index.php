<?php

use App\Controllers\MainController;

require '../autoload.php';
require_once '../config/config.php';

$controller = new MainController();
$controller->index();

