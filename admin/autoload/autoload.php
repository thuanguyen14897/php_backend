<?php
session_start();
require_once __DIR__."/../../lib/database.php";
require_once __DIR__."/../../lib/function.php";

$db = new database;

if (!isset($_SESSION['admin_id'])) {
    header("location:/php_test/login/");
}
define("ROOT", $_SERVER['DOCUMENT_ROOT']."/php_test/public/upload/");


?>