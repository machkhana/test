<?php
$message='';
require_once ('config/connect.php');
require_once ('class/class.main.php');
//GET method
if(isset($_GET['p'])){$p=$sql->real_escape_string($_GET['p']);}
