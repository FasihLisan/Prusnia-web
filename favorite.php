<?php require './layout/headerIndex.php'; 
require_once './controller/favoriteController.php';
$favorit = new favoriteController();
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
    <h2 class="title">Favorite</h2>
    <span class="subtitle">My Favorite Collection</span>
    <div class="container">
      <div class="search">
        <form action="#" method="post">
          <input type="text" name="search" id="search" placeholder="Cari buku" class="search-input" />
          <i class="fa-solid fa-search"></i>
        </form>
      </div>

      <div class="book-content">
        <?php if ($favorit->getFavorite($_SESSION['userdata'] ['id_users']) != null) :  ?>
          <?php foreach ($favorit->getFavorite($_SESSION['userdata'] ['id_users']) as $fav) : //var_dump($fav);?>
        <div class="card-book">
          <div class="book-cover">
            <div class="book-rate">
              <i class="fa-solid fa-star"></i>
              <span><?=$fav['rate_book'] ?></span>
            </div>
            <a href="viewPDF.php?file=<?=$fav['file_buku'] ?>"> <img src="./assets/images/<?=$fav['cover']; ?>" alt="" /></a>
            
          </div>
          <h3 class="book-title"><a href="viewPDF.php?file=<?=$fav['file_buku'] ?>"> <?=$fav['judul'] ?> </a></h3>
          <span><?=$fav['author'] ?></span>
          <h3 class="price"> Rp.<?= number_format ($fav['harga'], 2) ?></h3>
          <a href="" class="btn"><span class="fa-solid fa-shopping-cart"></span> Add to cart</a>
        </div>

        <?php endforeach ?>
  <?php else : ?>
    <h5 class="text-muted">Data kosong</h5>
  <?php endif ?>

      </div>
    </div>
  </div>
  </div>
</section>


<?php include_once './layout/footerIndex.php' ?>