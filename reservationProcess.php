<?php
require_once "./admin/checkSession.php";
include_once "autoloaderClass.php";
include_once "classes/dbInfo.php";

if (isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? trim($_POST['name']) : "";
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : "";
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $book_time = isset($_POST['time']) ? trim($_POST['time']) : "";
    $person = isset($_POST['person']) ? trim($_POST['person']) : "";
    $book_date = isset($_POST['date']) ? trim($_POST['date']) : "";
    $flag = true;


    if (empty($name) || empty($phone) || empty($email) || empty($book_time) || empty($person) || empty($book_date)) {
        $flag = false;
        $error = 'Please fill in all fields !!';

    }
    if ($flag) {
        $options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
        $conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);
        $sql = "insert into reservation(ReservationName,ReservationEmail,ReservationPhone,ReservationDate,ReservationTime,ReservationPerson) values (?,?,?,?,?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $email, $phone, $book_date, $book_time, $person]);
        echo "Booking a table success !!";
		
    } else {
        echo $error;
    }
}




?>
