<?php
$active = "dasbhaord.php";
require_once './layout/headerBookCenter.php';

require_once './controller/bookController.php';
$book = new bookController();

?>

<h4 class="my-4">Top rated book</h4>
<div class="container top-rated-book">

  <div class="row g-4 my-4 mx-auto owl-carousel owl-theme ">

    <?php if ($book->getTopRateBook() != null) :  ?>
      <?php foreach ($book->getTopRateBook() as $b) : ?>
        <div class="col product-item">
          <div class="product-img">
            <img src="./assets/images/<?= $b['cover']; ?>" alt="" class="img-fluid d-block mx-auto">
          </div>

          <div class="product-info p-3">
            <span class="product-type"><?= $b['author']; ?></span>
            <a href="#" class="d-block text-dark text-decoration-none py-2 product-name"><?= $b['judul']; ?></a>
            <span class="product-price">Rp. <?= number_format($b['harga'], 2) ?></span>
            <div class="mt-1">
              <input id="input-id" type="text" class="rating" data-size="xs" value="<?= $b['rate_book']; ?>" readonly>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    <?php else : ?>
      <h5 class="text-muted">Data kosong</h5>
    <?php endif ?>

  </div>

</div>
<h4 class="my-4">Some book</h4>

<div class="container top-rated-book">
  <div class="row g-4 my-4 mx-auto owl-carousel owl-theme top-rated-book">

    <?php if ($book->getAllbook() != null) :  ?>
      <?php foreach ($book->getAllbook() as $b) : ?>
        <div class="col product-item">
          <div class="product-img">
            <img src="./assets/images/<?= $b['cover']; ?>" alt="" class="img-fluid d-block mx-auto">
          </div>

          <div class="product-info p-3">
            <span class="product-type"><?= $b['author']; ?></span>
            <a href="#" class="d-block text-dark text-decoration-none py-2 product-name"><?= $b['judul']; ?></a>
            <span class="product-price">Rp. <?= number_format($b['harga'], 2) ?></span>
            <div class="mt-1">
              <input id="input-id" type="text" class="rating" data-size="xs" value="<?= $b['rate_book']; ?>" readonly>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    <?php else : ?>
      <h5 class="text-muted">Data kosong</h5>
    <?php endif ?>


    <?php require './layout/footerBookCenter.php' ?>