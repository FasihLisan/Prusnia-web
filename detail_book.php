<?php require './layout/headerIndex.php';
require_once './controller/bookController.php';
require_once './controller/feedbackController.php';
$book = new bookController();
$feedback = new feedbackController();

if ($book->getSpesiificBook($_GET['id'])) {
	$bok = $book->getSpesiificBook($_GET['id']);
}
if ($feedback->getAllRatebook($_GET['id'])) {
	$feed = $feedback->getAllRatebook($_GET['id']);
}

// var_dump($feed);
// die;
?>

<section class="container detile-book">
	<div class="row">
		<div class="col col1 book-identity">
			<ul>
				<li class="book-title"><?= $bok['judul']; ?></li>
				<li class="book-author"><?= $bok['author']; ?></li>
				<li class="book-tgl"><?= date("d M Y", strtotime($bok['publication_date'])) ?></li>
				<li class="status-book">
					<ul>
						<li>
							<ul class="rating">
								<li class="title"><?= isset($bok['rate_book']) ? $bok['rate_book'] : "0.0" ?><i class="fa-solid fa-star"></i></li>
								<li class="subtitle"><?= isset($feed) ? count($feed) : "0"  ?> reviews</li>
							</ul>
						</li>
						<li>
							<ul class="pages">
								<li class="title"><?= $bok['halaman']; ?></li>
								<li class="subtitle">Pages</li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="book-button">
					<ul>
						<li>
							<a href="" class="btn btn-buy">IDR. 120,000 Buy</a>
						</li>
						<li>
							<a href="" class="btn btn-cart"><i class="fa-solid fa-cart-shopping"></i></a>
						</li>
						<li>
							<a href="" class="btn btn-favorite"><i class="fa-solid fa-heart"></i></a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="col col2">
			<div class="book-cover">
				<img src="./assets/images/<?= $bok['cover']; ?>" alt="">
			</div>
		</div>
	</div>
</section>

<section class="container desc-book ">
	<div class="row">
		<div class="col col1">
			<p class="section-title">About this book</p>
			<p><?= $bok['description']; ?></p>

			<p class="section-title">Some feedback</p>
			<?php if (isset($feed)) : ?>
				<?php foreach (($feed) as $b) : ?>
					<div class="feedback">
						<ul>
							<li class="rating-profile">
								<ul>
									<li class="rating-image">
										<img src="./assets/images/<?= $b['foto']; ?>" alt="">
									</li>
									<li class="rating-name-rt">
										<ul>
											<li class="rating-name"><?= $b['nama_lengkap']; ?></li>
											<li class="rating-rt-tgl">
												<ul>
													<li class="rating"> <input id="input-id" type="text" class="rating" data-size="xs" value="<?= $b['rate_score']; ?>" readonly></li>
													<li class="rating-tgl"><?= date("d/m/Y", strtotime($b['created_at'])) ?></li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<li class="feedback"><?= $b['comment']; ?></li>
						</ul>
					</div>
				<?php endforeach ?>
			<?php else : ?>
				<span style="color: grey;">Feedback not found</span>
			<?php endif ?>


		</div>
		<div class="col col2">
		</div>
	</div>
</section>


<?php include_once './layout/footerIndex.php' ?>