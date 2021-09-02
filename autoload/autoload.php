<?php
session_start();
require_once __DIR__."/../lib/database.php";
require_once __DIR__."/../lib/function.php";

$db = new database;
define("ROOT", $_SERVER['DOCUMENT_ROOT']."/php_test/public/upload/");


?>