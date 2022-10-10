<?php
use ElliotJReed\DisposableEmail\DisposableEmail;
require 'api.php';
new api();
error_reporting(0);
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $email = $_GET['email'];

    $validate = new validate;
    if (!$validate->email($email)) $r = new response(204, 'Email format not supported.');
}