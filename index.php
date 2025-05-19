<?php

require_once "config/connect.php";

$stmt = $con->prepare("SELECT * FROM product");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">

    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Shopping Cart System</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');

        body {
            font-family: "Roboto", sans-serif;
        }

        nav {
            box-shadow: 0 0.5rem 1rem rgba(29, 30, 31, 0.25)
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark bg-light  py-2 ">
        <!-- Brand -->
        <a class="navbar-brand  ms-4 " href="index.php" style="font-size: 1.7em;"><img src="assets/img/logo.png" height="50"> &nbsp;Mobilax</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>


        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ms-auto ps-sm-3 ps-md-3">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="checkout.php">Checkout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-3" href="cart.php"><i class="fa fa-shopping-cart"></i> <span class="badge bg-danger" id="cart-item">1</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-4 pb-3">
            <?php foreach ($products as $product): ?>
                <div class="col-lg-3 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="<?= $product['product_image'] ?>" alt="" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-text text-center text-secondary"><?= $product['product_name'] ?></h5>
                            <h4 class="card-text text-center mt-2 fw-bold"><span class="text-success">$</span><?= $product['product_price'] ?></h4>
                        </div>
                        <div class="d-grid">
                            <a href="action.php?id=<?= $product['id'] ?>" class="btn btn-info text-white mb-2 mx-2"><i class="fa fa-cart-plus"></i> &nbsp;Add to cart</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

    </div>


    <!-- Footer -->
    <footer class="text-center py-4 text-muted mt-5 border-top">
        &copy; 2025 Mobile Store. All rights reserved.
    </footer>



    <!-- Bootstrap Js Link -->
    <script src="assets/js/bootstrap.bundle.js"></script>
</body>

</html>