<?php
require_once "./admin/checkSession.php";
include_once "autoloaderClass.php";
include_once "classes/dbInfo.php";

if (isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? trim($_POST['name']) : "";
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : "";
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $message = isset($_POST['message']) ? trim($_POST['message']) : "";
    $flag = true;

    if (empty($name) || empty($phone) || empty($email)) {
        $flag = false;
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong>Please fill in required fields !!</div>';

    }
    if ($flag) {
        $options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
        $conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);
        $sql = "insert into contact(FullName,Email,Phone,Message) value (?,?,?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $email, $phone, $message]);
        echo "We will get back to you sooon !!";
    } else {
        echo $error;
    }
}

?>

