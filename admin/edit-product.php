<?php
require_once "checkSession.php";
include_once "../autoloaderClassC2.php";
include_once "upload.php";
include_once "../classes/dbInfo.php";

$error = "";
$success = "";
if (isset($_GET['id'])) {
    $mealId = $_GET['id'];

} else header("location: showproducts.php");

if (isset($_GET['statusInfo']) && $_GET['statusInfo'] == "success") {
    $success = "<div class='alert alert-success'> Edit info successfully !!</div>";
}
if (isset($_GET['statusImage']) && $_GET['statusImage'] == "success") {
    $success = "<div class='alert alert-success'> Edit image successfully !!</div>";
}


$meal = new Meal();
$meal->mealId = $mealId;
if (empty($meal->getmealId())) {
    header("location: showproducts.php");
}
$data = $meal->getMealId()[0];


if (isset($_POST['submit'])) {
    $error = "";
    $success = "";
    $name = isset($_POST['name']) ? trim($_POST['name']) : "";
    $info = isset($_POST['info']) ? trim($_POST['info']) : "";
    $price = isset($_POST['price']) ? trim($_POST['price']) : "";
    $type = isset($_POST['type']) ? trim($_POST['type']) : "";
    $flag = true;
    if (empty($name) || empty($info) || empty($price) || empty($type)) {
        $flag = false;
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong>Please fill in all fields !!</div>';
    } else {
        $objMeal = new Meal();
        $objMeal->mealId = $mealId;
        $objMeal->deleteMeal();
        $result = $objMeal->getmealName();
        if (!empty($result)) {
            $flag = false;
            $error = '<div class="alert alert-danger"> <strong>Oops!</strong> Meal name already exist!! !!</div>';
        }

    }

    if ($flag) {
        $objMeal = new Meal();
        $objMeal = new Meal();
        $objMeal->mealName = $name;
        $objMeal->mealInfo = $info;
        $objMeal->price = $price;
        $objMeal->mealType = $type;
        $objMeal->image = $data['Image'];
        $newId = $objMeal->addMeal();
        $_SESSION['newId'] = $newId;
        header("location: edit-product.php?id=$newId&statusInfo=success");
    }
}
if (isset($_POST['submit1'])) {
    $flag = true;
    if (empty($_FILES['image']['type'])) {
        $flag = false;
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong> Please upload your images !! </div>';
    } else {
        $size = 10;
        $upload = UploadFile("image", "../uploaded/", 1, $size, "submit1");
        $image = json_decode($upload);
        $link = $image->file;
        $link = substr($link, 3);

        if (!$image->kq) {
            $flag = false;
            $error = '<div class="alert alert-danger"> <strong>Oops!</strong> image must be jpeg, png, gif and jpg and under ' . $size . ' MB  </div>';
        }
    }
    if ($flag) {
        $objMeal = new meal();
        $objMeal->image = $link;
        $objMeal->mealId = $_SESSION['newId'];
        $objMeal->updateMealLink();
        header("location: edit-product.php?id=" . $_SESSION['newId'] . "&statusImage=success");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Edit Product - Dashboard Admin Template</title>
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
        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    <a class="nav-link dropdown-toggle" href="products.php" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">EDIT MEALS</h2>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <form action="" method="post" class="tm-edit-product-form">
                            <form action="edit-product.php" class="tm-edit-product-form" enctype="multipart/form-data" method="post">
                                <div style="text-align: center; font-weight: bold">
                                    <?php echo $error; ?>
                                    <?php echo $success; ?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name">Edit Meal Name</label>
                                    <input id="name" name="name" type="text" value="<?php echo $data['MealName'] ?>"
                                           class="form-control validate" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description">Edit Meal Info</label>
                                    <textarea class="form-control validate tm-small" name="info"
                                              rows="5"><?php echo $data['MealInfo'] ?></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="category">Edit Meal Type</label>
                                    <select class="custom-select tm-select-accounts" id="category" name="type">
                                        <option selected>Select type</option>
                                        <option value="Lunch" <?php if ($data['MealType'] == "Lunch") echo "selected" ?>>
                                            Lunch
                                        </option>
                                        <option value="Regular"
                                            <?php if ($data['MealType'] == "Regular") echo "selected" ?>>
                                            Regular
                                        </option>
                                        <option value="Snacks" <?php if ($data['MealType'] == "Snacks") echo "selected" ?>>
                                            Snacks
                                        </option>
                                        <option value="Beverages" <?php if ($data['MealType'] == "Beverages") echo "selected" ?>>
                                            Beverages
                                        </option>
                                        <option value="Beverages" <?php if ($data['MealType'] == "Desserts") echo "selected" ?>>
                                            Desserts
                                        </option>
                                    </select>
                                </div>
                                <div class="row">

                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label for="price">Edit Price
                                        </label>
                                        <input id="price" name="price" type="text"
                                               value="<?php echo $data['Price'] ?>" class="form-control validate" />
                                    </div>
                                </div>

                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">

                        <div class="custom-file mt-3 mb-3">
                            <label for="" style="color:#FFFFFF;">Edit Image</label>
                            <input id="fileInput" type="file" name="image" value="" />
                        </div>
                        <div class="custom-file mt-3 mb-3">
                            <label for="" style="color:#FFFFFF;">Current Image</label>
                            <img  style="width: 350px; display: block; border: #FFFFFF solid 1px" src="../<?php echo $data['Image'] ?>" alt="">
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="submit" value="submit" na
                                class="btn btn-primary btn-block text-uppercase">
                            Edit
                            info
                        </button>
                        <button type="submit" name="submit1" value="submit1"
                                class="btn btn-primary btn-block text-uppercase">
                            Edit
                            Image
                        </button>
						<a href="showproducts.php"
                                class="btn btn-primary btn-block text-uppercase">
                            Back to Show Meals
                        </a>
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
        $("#edit_date").datepicker({
            defaultDate: "10/22/2020"
        });
    });
</script>
</body>

</html>