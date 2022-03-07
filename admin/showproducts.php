<?php require_once "checkSession.php";
include_once "../autoloaderClassC2.php"; ?>

<?php

$meal = new meal();
$datas = $meal->getMealAll()

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Product Page - Admin HTML Template</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body id="reportsPage">
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
                        <a class="dropdown-item" href="reservation.php">Reservation Report</a>
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
<div class="container mt-5">
    <div class="row tm-content-row">
        <div class="col-xl-15 col-lg-15 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-products">
                <div class="tm-product-table-container">
                    <table class="table table-hover tm-table-small tm-product-table">
                        <thead>
                        <tr>
                            <th scope="col">&nbsp;</th>
                            <th scope="col">MEAL NAME</th>
                            <th scope="col">IMAGE</th>
                            <th scope="col">MEAL INFO</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">MEAL TYPE</th>
                            <th scope="col">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($datas)): ?>
                            <?php foreach ($datas as $data): ?>

                                <tr onclick="window.open('./edit-product.php?id=<?php echo $data['MealId'] ?>','_blank')">

                                    <td>&nbsp;</td>
                                    <td class=""><?php echo $data['MealName'] ?></td>
                                    <td>
                                        <img src="../<?php echo $data['Image'] ?>" style="width: 50px; " alt="">
                                    </td>
                                    <td><?php echo $data['MealInfo'] ?></td>
                                    <td><?php echo $data['Price'] ?> $</td>
                                    <td><?php echo $data['MealType'] ?></td>
                                    <td>
                                        <a href="deleteMeal.php?id=<?php echo $data['MealId'] ?>" class="tm-product-delete-link">
                                            <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                        </a>
                                    </td>
                                    </a>
                                </tr>

                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <!-- table container -->
                <a href="add-product.php" class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
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
<script src="js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->
<script>
    $(function () {
        $(".tm-product-name").on("click", function () {
            window.location.href = "showproducts.php";
        });
    });
</script>
</body>

</html>