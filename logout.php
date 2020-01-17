<?php
session_start();
session_destroy();
session_unset($_SESSION["id"]);
header("Location:index.php");
exit();
?>
