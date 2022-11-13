<?php
require './controller/bookController.php';
require './controller/dashboardController.php';
$dashboard =  new dashboardController;
$bookCatalog =  new bookController;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootstrap % Fontawesome -->
  <link href="./assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/css/adminpanel.css" />
  <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Bootstrap % Fontawesome -->
  <!-- datatables -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <!-- datatables -->

  <!-- quill editor -->
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <!-- quill editor -->


  <title>Perusnia Book Center</title>
</head>

<body>
  <section class="container-fluid">
    <div class="row">
      <!-- navigation -->
      <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><i class="fa-solid fa-bars px-2 pe-4"></i> </i> Perusnia Book Center</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="./assets/images/p1.png" class="rounded-circle img-nav" width="40" alt="" srcset="" />
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-light bg-white mt-2">
                  <li><a class="dropdown-item" href="#">Setting</a></li>
                  <li><a class="dropdown-item text-danger" href="#">Sign Out</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- navigation -->
    </div>
    <div class="row section-admin-panel">
      <div class="col-md-2 sidebar-section bg-white border-end">
        <div class="sidebar-profile">
          <img src="./assets/images/p1.png" class="rounded-circle" width="50 alt=" />
          <div class="profile-status">
            <strong>Fasih</strong>
            <span><i class="fa-solid fa-circle fa-2xs text-success"></i> Online</span>
          </div>
        </div>

        <ul class="navbar-nav menus navbar-side">
          <li class="nav-item">
            <a href="<?= $dashboard->index()['view']; ?>" class="nav-link <?= $active ==  "dasbhaord.php" ? 'active' : '' ?>"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="<?= $bookCatalog->index()['view']; ?>" class="nav-link <?= $active ==  "bookCatalog.php" ? 'active' : '' ?>"><i class="fa-solid fa-book"></i> Book Catalog</a>
          </li>
          <li class="nav-item">
            <a href="paymentCenter.php" class="nav-link <?= $active ==  "paymentCenter.php" ? 'active' : '' ?>"><i class="fa-solid fa-credit-card"></i> Payment Center</a>
          </li>
          <li class="nav-item">
            <a href="category.php" class="nav-link <?= $active ==  "category.php" ? 'active' : '' ?>"><i class="fa-solid fa-filter"></i> Category</a>
          </li>
          <li class="nav-item">
            <a href="setting.php" class="nav-link <?= $active ==  "setting.php" ? 'active' : '' ?>"><i class="fa-solid fa-gear"></i> Setting</a>
          </li>
        </ul>
      </div>
      <div class="col content-section">

        <div class="row">
          <div class="content">
            <div class="container">