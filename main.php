<?php
require __DIR__ . '/vendor/autoload.php';
$router = new  \Bramus\Router\Router();
use ElliotJReed\DisposableEmail\DisposableEmail;
header('Content-type: application/json');
