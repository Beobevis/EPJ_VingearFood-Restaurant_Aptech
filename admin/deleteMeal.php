<?php

require_once "checkSession.php";
include_once "../autoloaderClassC2.php";
include_once "classes/dbInfo.php";
if (isset($_GET['id'])) {
    $mealId = $_GET['id'];

} else header("location: showproducts.php");

$meal = new meal();
$meal -> mealId = $mealId;
$meal -> deleteMeal();
header("location: showproducts.php");




?>