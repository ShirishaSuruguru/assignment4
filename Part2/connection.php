<?php
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'message_board');

$con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if($con->connect_error) {
    die('Could not connect to MySQL: ' . $con->connect_error);
    unset($con);
}

$con->set_charset('utf8');
?>