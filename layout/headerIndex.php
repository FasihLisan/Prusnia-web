<?php
require './controller/userController.php';
$user =  new userController;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/cart.css" />
    <script src="./assets/fontawesome/fontawesome.js"></script>
    <script src="./assets/js/jquery.min.js"></script>
    <title>Perusnia Books</title>
    <link rel="icon" href="" type="image/icon type" />
</head>

<body>
    <nav class="navigation index" id="navigation">
        <div class="container">
            <span class="navbar-brand"><a href="index.php">PERUSNIA BOOK</a></span>
            <ul class="navbar">
                <li class="nav-link"><a href="index.php">Home</a></li>
                <li class="nav-link"><a href="about.php">About</a></li>
                <li class="nav-link"><a href="books.php">Books</a></li>
                <?php if (isset($_SESSION['userdata']['is-login'])) : ?>
                    <li class="nav-link cart-btn">
                        <a href="cart.php"><i class="fa-solid fa-cart-shopping badge" value="9+"></i></a>
                    </li>
                <?php endif ?>
                <?php if (isset($_SESSION['userdata']['is-login'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= isset($user->getUserById($_SESSION['userdata']['id_users'])['foto']) ? "./assets/images/" . $user->getUserById($_SESSION['userdata']['id_users'])['foto'] : "./assets/images/default_image.png" ?>" class="rounded-circle img-nav" width="40" alt="" srcset="" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-light bg-white mt-2">
                            <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
                            <li><a class="dropdown-item" href="#">Setting</a></li>
                            <li><a class="dropdown-item text-danger" href="logout.php">Sign Out</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li class="nav-link"><a href="signin.php" class="sign-in">Sign In</a></li>
                <?php endif ?>
            </ul>
        </div>
    </nav>


    <!-- whatassppp buble -->
    <span class="whatsapp-buble"><a href="https://api.whatsapp.com/send?phone=6285336076077&text=halo%20saya%20fasih" target="_blank" class="fa-brands fa-4x fa-square-whatsapp"></a></span>
    <!-- whatassppp buble -->