<?php
require_once "./admin/checkSession.php";
include_once "autoloaderClass.php";
include_once "classes/dbInfo.php";

if (isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? trim($_POST['name']) : "";
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : "";
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
	$date = isset($_POST['date']) ? trim($_POST['date']) : "";
    $comment = isset($_POST['comment']) ? trim($_POST['comment']) : "";
    $flag = true;

    if (empty($name) || empty($phone) || empty($email) || empty($date)) {
        $flag = false;
        $error = 'Please fill in required fields !!';

    }
    if ($flag) {
        $options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
        $conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);
        $sql = "insert into feedback(FBName,FBEmail,FBPhone,FBDate,FBComment) value (?,?,?,?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $email, $phone, $date , $comment]);
        echo "Feedback added Sucessfully !!";
    } else {
        echo $error;
    }
}

?>

