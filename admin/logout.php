<?php

session_start();
unset($_SESSION['userName']);

header("location: login.php");



?>