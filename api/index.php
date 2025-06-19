<?php
require_once __DIR__ . '/controllers/HomeController.php';

$controller = new HomeController();
echo $controller->index();