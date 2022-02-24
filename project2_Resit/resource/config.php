<?php

ob_start(); //send a lot of request to php --> for redirect

session_start();
//session_destroy();




defined("DB_HOST") ? null : define("DB_HOST", "localhost");

defined("DB_USER") ? null : define("DB_USER", "root");

defined("DB_PASS") ? null : define("DB_PASS", "");

defined("DB_NAME") ? null : define("DB_NAME", "onlineshop3");

$connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS, DB_NAME);

require_once("functions.php");






?>
