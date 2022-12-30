<?php require './layout/headerIndex.php'; 
require_once './controller/bookController.php';

if ($_SESSION["userdata"]["is-login"] != true) {
  $_SESSION["failed"] = "Login required";
  header("Location: signin.php");
}

$book = new bookController();

?>


<section class="book-page" id="Books">
  <div class="sidebar-book">
    <ul>
      <li><a href="books.php">Books</a></li>
      <li><a href="mybooks.php">My Book</a></li>
      <li><a href="favorite.php">Favorite</a></li>
    </ul>
  </div>
  <div class="content-book">
    <h2 class="title">My Books</h2>
    <span class="subtitle">My Books Collection</span>
    <div class="container">
      <div class="search">
        <form action="#" method="post">
          <input type="text" name="search" id="search" placeholder="Cari buku" class="search-input" />
          <i class="fa-solid fa-search"></i>
        </form>
      </div>

      <div class="book-content">
      <?php if ($book->getMyBookUsers($_SESSION['userdata']['id_users']) != null) :  ?>
    <?php foreach ($book->getMyBookUsers($_SESSION['userdata']['id_users']) as $b) : ?>
        <div class="card-book">
          <div class="book-cover">
            <div class="book-rate">
              <i class="fa-solid fa-star"></i>
              <span>4.5/5</span>
            </div>
            <img src="./assets/images/<?=$b['cover']; ?>" alt="Cover Buku" />
          </div>
          <h3 class="book-title"><?=$b['judul']; ?></h3>
          <span><?=$b['author']; ?></span>
          <h3 class="price"><?=$b['harga'] ?></h3>
          <a href="" class="btn"><span class="fa-solid fa-shopping-cart"></span> Add to cart</a>
        </div>
        <?php endforeach ?>
        <?php else : ?>
          <h5 class="text-muted">Data kosong</h5>
        <?php endif ?>

      </div>
    </div>
  </div>
</section>


<?php include_once './layout/footerIndex.php' ?>