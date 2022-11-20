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
    <nav class="navigation" id="navigation">
        <div class="container">
            <span class="navbar-brand"><a href="index.php">PERUSNIA BOOK</a></span>
            <ul class="navbar">
                <li class="nav-link"><a href="index.php">Home</a></li>
                <li class="nav-link"><a href="about.php">About</a></li>
                <li class="nav-link"><a href="books.php">Books</a></li>
                <li class="nav-link cart-btn">
                    <a href="cart.php"><i class="fa-solid fa-cart-shopping badge" value="9+"></i></a>
                </li>
                <li class="nav-link"><a class="sign-in" onclick="signin()">Sign In</a></li>
            </ul>
        </div>
    </nav>

    <!-- login -->
    <div class="signin">
        <div class="box-signin">
            <i class="fa-solid fa-close" onclick="tutup()"></i>
            <h3 class="signin-title">Sign In</h3>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" placeholder="Enter Your Email" />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Your Password" />
                </div>
                <div class="button-signin">
                    <input type="submit" value="Sign In" name="Submit" />
                    <a href="#" onclick="signup()">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
    </div>
    <div class="darkbg"></div>
    <div class="signup">
        <div class="box-signup">
            <i class="fa-solid fa-close" onclick="tutup()"></i>
            <h3 class="signup-title">Sign Up</h3>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" placeholder="Masukkan Nama" />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Masukkan Email" />
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="number" name="telepon" placeholder="Masukkan Telepon" />
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" placeholder="Masukkan Alamat" />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Masukkan Password" />
                </div>
                <div class="form-group">
                    <label for="password_verifikasi">Password Verifikasi</label>
                    <input type="password" name="password_verifikasi" placeholder="Masukkan Password Verifikasi" />
                </div>
                <div class="button-signup">
                    <input type="submit" value="Sign Up" name="Submit" />
                    <a href="#" onclick="signin()">Sign In</a>
                </div>
            </form>
        </div>
    </div>

    <!-- whatassppp buble -->
    <span class="whatsapp-buble"><a href="https://api.whatsapp.com/send?phone=6285336076077&text=halo%20saya%20fasih" target="_blank" class="fa-brands fa-4x fa-square-whatsapp"></a></span>
    <!-- whatassppp buble -->