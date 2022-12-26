<?php require './layout/headerIndex.php';
require_once './controller/ContactController.php';
require_once './controller/bookController.php';
require_once './controller/bookController.php';
$contact = new ContactController();
$data2 = $contact->index();
$book = new bookController();
$bok = $book->getAllbook();

if (isset($_POST["search"])) {
	$book = new bookController();
	if ($book->cari($_POST) > 0) {
		echo "Data berhasil ditambahkan.";
	} else {
		echo "Data gagal ditambahkan.";
	}
}
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
		<h2 class="title">Books</h2>
		<span class="subtitle">Books Collection</span>
		<div class="container">
			<div class="search">
				<form action="" method="post">
					<input type="text" name="search" id="search" placeholder="Cari buku" class="search-input" autocomplete="off" />
					<i class="fa-solid fa-search"></i>
				</form>
			</div>

			<div class="category-book-page">
				<ul>
					<li><a href="#">Free</a></li>
					<li><a href="#">Paid</a></li>
				</ul>
			</div>
			<div class="book-content">

				<?php foreach ($bok as $b) : ?>
					<div class="card-book">
						<div class="book-cover">
							<div class="book-rate">
								<i class="fa-solid fa-star"></i>
								<span><?= $b['rate_book'] ? $b['rate_book'] : "0" ?>/5</span>
							</div><a href="detail_book.php?id=<?= $b['id_book'] ?>"><img src="./assets/images/<?= $b['cover'] ?>" alt="cover_buku" /></a>
						</div>
						<h3 class="book-title"><a href="detail_book.php?id=<?= $b['id_book'] ?>"><?= $b['judul'] ?></a></h3>
						<span><?= $b['author'] ?></span>
						<h3 class="price">Rp. <?= number_format($b['harga'], 2) ?></h3>
						<a href="" class="btn"><span class="fa-solid fa-shopping-cart"></span> Add to cart</a>
					</div>
				<?php endforeach; ?>

			</div>
		</div>
	</div>
</section>


<?php include_once './layout/footerIndex.php';
?>