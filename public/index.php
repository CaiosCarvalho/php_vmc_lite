<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

$config = require __DIR__ . '/../config/database.php';
$dsn = "pgsql:host={$config['host']};dbname={$config['dbname']}";
$db = new PDO($dsn, $config['user'], $config['password']);


$router = new Router($db);
$router->run();
