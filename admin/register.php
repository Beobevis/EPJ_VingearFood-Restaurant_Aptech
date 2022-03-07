<?php
session_start();
include "../autoloaderClassC2.php";


$error = "";
$success = "";

if (isset($_POST['submit'])) {
    $flag = true;
    $userName = (isset($_POST['userName'])) ? trim($_POST['userName']) : " ";
    $pw = (isset($_POST['pw'])) ? trim($_POST['pw']) : " ";
    $pwRepeat = (isset($_POST['pwRepeat'])) ? trim($_POST['pwRepeat']) : " ";
    if (empty($userName) || empty($pw) || empty($pwRepeat)) {
        $flag = false;
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong> please fill in all fields </div>';
    } else if ($pw != $pwRepeat) {
        $flag = false;
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong> password and confirmation password do not match</div>';
    } else {
        $admin = new Admin();
        $admin->username = $userName;
        $data = $admin->getAdminUserName();
        if (!empty($data)) {
            $flag = false;
            $error = '<div class="alert alert-danger"> <strong>Oops!</strong> username is already taken</div>';
        }
    }
    if ($flag) {
        $admin = new admin();
        $pwHashed = password_hash($pw, PASSWORD_DEFAULT);
        $admin->username = $userName;
        $admin->password = $pwHashed;
        $admin->addAdmin();
        $success = "  <div class=\"alert alert-success\"  role=\"alert\">Account successfully created</div>";

    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN VINGEARFOOD </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alatsi">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Atomic+Age">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="css/Animated-Pretty-Product-List-v12.css">
    <link rel="stylesheet" href="css/Navbar-with-menu-and-login.css">
    <link rel="stylesheet" href="css/login.css">

</head>
<body>
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <form method="post" action="./register.php">
        <div class="card card0 border-0">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="card1 pb-5">
                        <div class="row">&nbsp;</div>
                        <div class="row">&nbsp;</div>
                        <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
						<img src="img/logotitle.png" class="image"></div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card2 card border-0 px-4 py-5">
                        <div class="row px-3"><label class="mb-1">
                                <h6 class="mb-0 text-sm">Username</h6>
                            </label>
                            <input class="mb-4" type="text" name="userName" placeholder="Enter a valid user name">
                        </div>
                        <div class="row px-3"><label class="mb-1">
                                <h6 class="mb-0 text-sm">Password</h6>
                            </label>
                            <input type="password" name="pw" placeholder="Enter password">
                        </div>
                        <br>
                        <div class="row px-3"><label class="mb-1">
                                <h6 class="mb-0 text-sm">Password confirm</h6>
                            </label>
                            <input type="password" name="pwRepeat" placeholder="Enter password confirm"></div>

                        <?php
                        echo $error;
                        ?>


                        <?php
                        echo $success;
                        ?>

                        <br>
                        <div class="row mb-3 px-3">
                            <button type="submit" name="submit" value="submit" class="btn btn-blue text-center">
                                Sign Up
                            </button>
                        </div>

                        <div class="row mb-4 px-3"><small class="font-weight-bold"> Are you having a account?
                                <a href="login.php"
                                   class="text-danger ">Sign in now</a></small></div>
                    </div>
                </div>

            </div>
            <div class="bg-blue py-4">
                <div class="row px-3"><small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2021. All rights
                                                                       reserved by GROUP2 C2007L APTECH APROTRAIN HANOI VIET NAM.</small>
                    <div class="social-contact ml-4 ml-sm-auto"><span class="fa fa-facebook mr-4 text-sm"></span>
                        <span
                                class="fa fa-google-plus mr-4 text-sm"></span> <span
                                class="fa fa-linkedin mr-4 text-sm"></span> <span
                                class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span></div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
</body>
</html>
