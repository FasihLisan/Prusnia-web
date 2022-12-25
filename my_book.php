<?php
$active = "my_book.php";
require './layout/headerBookCenter.php';

require_once './controller/bookController.php';
$book = new bookController();
?>

<h4 class="my-4">My Book</h4>

<div class="container my-book">

  <?php if ($book->getMyBookUsers($_SESSION['userdata']['id_users']) != null) :  ?>
    <?php foreach ($book->getMyBookUsers($_SESSION['userdata']['id_users']) as $b) : ?>
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
<?php
require_once './layout/footerBookCenter.php';
?>