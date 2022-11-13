<?php
$active = "dasbhaord.php";
require './layout/headerBookCenter.php'
?>

<h4 class="my-4">Dashboard</h4>
<div class="row justify-content-md-center">
	<div class="col">
		<div class="card border-success mb-3" style="max-width: 18rem; width: 20rem; text-align: center">
			<div class="card-header">My Book</div>
			<div class="card-body text-success px-5 py-5 fs-1">
				<p class="card-text">15</p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card border-primary mb-3" style="max-width: 18rem; width: 20rem; text-align: center">
			<div class="card-header">Published Book</div>
			<div class="card-body text-primary px-5 py-5 fs-1">
				<p class="card-text">3</p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card border-danger mb-3" style="max-width: 18rem; width: 20rem; text-align: center">
			<div class="card-header">Sold</div>
			<div class="card-body text-danger px-5 py-5 fs-1">
				<p class="card-text">14</p>
			</div>
		</div>
	</div>
</div>



<?php require './layout/footerBookCenter.php' ?>