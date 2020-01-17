<?php
error_reporting(E_ALL);
ob_start();
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "satesto";
$sql = new mysqli($host,$user,$pass,$db);
$sql->query("SET NAMES utf8");
?>



