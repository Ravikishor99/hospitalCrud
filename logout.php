<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
header("Location: index.php");
exit; // Make sure to exit after redirecting

?>