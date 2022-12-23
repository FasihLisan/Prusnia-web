<?php require './layout/headerIndex.php'; 
require_once './controller/bookController.php';
$book = new bookController();
$bok = $book->tampil();
if (isset($_GET['id'])){
$bok=$book->detailBok($_GET['id']);
}
//var_dump($bok); die;
?>

<section class="about-page">
    <h2 class="title">Book</h2>
    <span class="subtitle"> Detail Book</span>

    <div class="container">
    <div class="card-book">
			<div class="book-cover">
				<div class="book-rate">
					<i class="fa-solid fa-star"></i>
					<span>4/5</span>
				</div>
                <img src="./assets/images/<?=$bok['cover'] ?>" alt="sampul buku" />
			</div>
            <h3 class="book-title"><?=$bok['judul'] ?></h3>
            <span><?=$bok['author'] ?></span><br><br>
            <h3 class="price"><?=$bok['harga'] ?></h3>
		</div>

        <div class="desc-about">
          <h3>Sinopsis buku:</h3>
            <?=$bok['description'] ?><br><br>
            <span>Ditambahkan pada:</span><br>
            <span><?=$bok['publication_date'] ?></span>

            <div class="container text-center">
              <div class="row align-items-start">
                <div class="col">
                <button class="button-next" name="baca">Baca buku</button>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col">
                <button class="button-cart" class="vertical-align:middle" name="cart"><span>Cart</span></button>
                </div>
              </div>
              <!--<div class="row align-items-end">
                <div class="col">
                Data
                </div>
              </div>-->
            </div>

        </div>
    </div>
</section>
<section class="testimoni" id="testimoni">
	<h2 class="title">Rate Book</h2>
	<span class="subtitle">Other people's response</span>
	<div class="container">
		<div class="card-testimoni">
			<div class="rate-testimoni"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
			<div class="card-text">Tempatnyua nyaman, koleksi uangnya sangat lengkap dan salah satu musium terlengkap seluruh dunia</div>
			<div class="card-profile">
				<div class="profile-image">
					<img src="./assets/images/p1.png" alt="" />
				</div>
				<div class="profile-name">
					<b>Herlambang</b>
					<span>Penggemar Uang Kuno</span>
				</div>
			</div>
		</div>
		<div class="card-testimoni">
			<div class="rate-testimoni"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
			<div class="card-text">Tempatnyua nyaman, koleksi uangnya sangat lengkap dan salah satu musium terlengkap seluruh dunia</div>
			<div class="card-profile">
				<div class="profile-image">
					<img src="./assets/images/p1.png" alt="" />
				</div>
				<div class="profile-name">
					<b>Herlambang</b>
					<span>Penggemar Uang Kuno</span>
				</div>
			</div>
		</div>
		<div class="card-testimoni">
			<div class="rate-testimoni"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
			<div class="card-text">Tempatnyua nyaman, koleksi uangnya sangat lengkap dan salah satu musium terlengkap seluruh dunia</div>
			<div class="card-profile">
				<div class="profile-image">
					<img src="./assets/images/p1.png" alt="" />
				</div>
				<div class="profile-name">
					<b>Herlambang</b>
					<span>Penggemar Uang Kuno</span>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include_once './layout/footerIndex.php' ?>