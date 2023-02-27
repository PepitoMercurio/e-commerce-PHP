<?php
session_start();
$Id = $_SESSION["ID"];
$Username = $_SESSION["prenom"];
$Lastname = $_SESSION["nom"];
$Birth = $_SESSION["birthday"];
$Code = $_SESSION["code"];
session_destroy();
header("Location: http://localhost/z/e-commerce-PHP/e-commerce-PHP/html-php/log.php");
exit();
?>