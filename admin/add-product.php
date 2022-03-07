<?php
require_once "checkSession.php";
include_once "../autoloaderClass.php";
include_once "upload.php";

$error = "";
$success = "";
if (isset($_GET['status']) && $_GET['status'] == "success") {
    $success = '<div class="alert alert-success">Add product successfully !!</div>';
}


if (isset($_POST['submit'])) {
    $error = "";
    $success = "";
    $name = isset($_POST['name']) ? trim($_POST['name']) : "";
    $info = isset($_POST['info']) ? trim($_POST['info']) : "";
    $price = isset($_POST['price']) ? trim($_POST['price']) : "";
    $type = isset($_POST['type']) ? trim($_POST['type']) : "";
    $flag = true;
    $link = "";


    if (empty($name) || empty($info) || empty($price) || empty($type)) {
        $flag = false;
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong>Please fill in all fields !!</div>';
    } else if ($_FILES['image']['name'] == null) {
        $flag = false;
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong>Please upload your image !! !!</div>';
    } else {
        $objMeal = new Meal();
        $objMeal -> mealName = $name;
        $data = $objMeal -> getMealName();
        if(!empty($data)){
            $flag = false;
              $error = '<div class="alert alert-danger"> <strong>Oops!</strong> Meal name already exist!! !!</div>';
        }

    }

    if ($flag) {
        $image = UploadFile("image", "../uploaded/", 1, 10, "submit");
        $upload = json_decode($image);
        if ($upload->kq) {
            $link = $upload->file;
        }

        if ($link != "") {
            $link = substr($link, 3);
            $objMeal = new Meal();
            $objMeal->mealName = $name;
            $objMeal->mealInfo = $info;
            $objMeal->price = $price;
            $objMeal->mealType = $type;
            $objMeal->image = $link;
            $newId = $objMeal->addMeal();
            header("location: add-product.php?status=success");

        }


    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Add Product - VingearFood</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">

</head>

<body>
<nav class="navbar navbar-expand-xl">
    <div class="container h-100">
        <a class="navbar-brand" href="adminpage.php">
            <h1 class="tm-site-title mb-0">VingearFood Admin</h1>
        </a>
        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto h-100">
                <li class="nav-item">
                    <a class="nav-link active" href="adminpage.php">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-file-alt"></i>
                        <span>
                                Report <i class="fas fa-angle-down"></i>
                            </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="contactreport.php">Contact Report</a>
                        <a class="dropdown-item" href="reservationreport.php">Reservation Report</a>
                        <a class="dropdown-item" href="feedbackreport.php">Feedback Report</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="products.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-shopping-cart"></i>
                        <span>
                                Products <i class="fas fa-angle-down"></i>
                            </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="add-product.php">Add Meals</a>
                        <a class="dropdown-item" href="edit-product.php">Edit Meals</a>
                        <a class="dropdown-item" href="showproducts.php">Show Meals</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link d-block" href="login.php">
                        Admin, <b>Logout</b>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</nav>

<form action="#" method="post" enctype="multipart/form-data">
    <div class="" style="text-align: center; font-weight: bold">
        <?php echo $error; ?>
        <?php echo $success; ?>
    </div>

    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">ADD MEALS</h2>
                        </div>
                    </div>
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <form action="" class="tm-edit-product-form">
                                <div class="form-group mb-3">
                                    <label for="name">Meal Name
                                    </label>
                                    <input id="name" name="name" type="text" class="form-control validate" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description">Meal Info</label
                                    >
                                    <textarea class="form-control validate" rows="3" name="info"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label
                                            for="category"
                                    >Meal Type</label
                                    >
                                    <select class="custom-select tm-select-accounts" name="type" id="category">
                                        <option selected>Select type</option>
                                        <option value="Lunch">Lunch</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Desserts">Desserts</option>
                                        <option value="Snacks">Snacks</option>
                                        <option value="Beverages">Beverages</option>
                                    </select>
                                </div>
                                <div class="row">

                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label for="stock">Price
                                        </label>
                                        <input id="price" name="price" type="number" class="form-control validate" />
                                    </div>
                                </div>

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                            <div class="tm-product-img-dummy mx-auto">
                                <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('fileInput').click();"></i>
                            </div>
                            <div class="custom-file mt-3 mb-3">
                                <input id="fileInput" type="file" name="image" style="display:none;" />
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block text-uppercase">
                                Add Product Now
                            </button>

                        </div>
</form>
</div>
</div>
</div>
</div>
</div>
<footer class="tm-footer row tm-mt-small">
    <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
            Copyright &copy; <b>2021</b> All rights reserved by GROUP2 C2007L APTECH APROTRAIN HANOI VIETNAM
        </p>
    </div>
</footer>

<script src="js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
<!-- https://jqueryui.com/download/ -->
<script src="js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->
<script>
    $(function () {
        $("#upload_date").datepicker();
    });
</script>
</body>

</html>