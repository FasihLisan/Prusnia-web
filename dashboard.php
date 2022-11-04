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

		<title>Perusnia | Dashboard</title>
	</head>
	<body>
		<section class="container-fluid">
			<div class="row section-admin-panel">
				<div class="col-auto sidebar-section bg-light">
					<h4 class="sidebar-title">Perusnia Book</h4>
					<div class="sidebar-profile">
						<img src="./assets/images/p1.png" class="rounded-circle" width="50 alt=" />
						<div class="profile-status">
							<strong>Fasih</strong>
							<span><i class="fa-solid fa-circle fa-2xs text-success"></i> Online</span>
						</div>
					</div>

					<ul class="navbar-nav menus">
						<li class="nav-item">
							<a href="#" class="nav-link active"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"><i class="fa-solid fa-book"></i> Book</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"><i class="fa-solid fa-credit-card"></i> Payment Centre</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"><i class="fa-solid fa-filter"></i> Category</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"><i class="fa-solid fa-gear"></i> Setting</a>
						</li>
					</ul>
				</div>
				<div class="col content-section">
					<div class="row">
						<nav class="navbar navbar-expand-lg navbar-dark bg-success">
							<div class="container-fluid">
								<a class="navbar-brand" href="#"><i class="fa-solid fa-bars"></i></a>
								<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>
								<div class="collapse navbar-collapse" id="navbarNav">
									<ul class="navbar-nav ms-auto">
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
												<img src="./assets/images/p1.png" class="rounded-circle" width="30" alt="" srcset="" />
												Fasih</a
											>
											<ul class="dropdown-menu dropdown-menu-end dropdown-menu-light bg-white">
												<li><a class="dropdown-item" href="#">Setting</a></li>
												<li><a class="dropdown-item text-danger" href="#">Sign Out</a></li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</nav>
					</div>
					<div class="row">
						<div class="content">
							<div class="container">
								<h4 class="p-3">Dashboard</h4>
								<div class="d-flex justify-content-evenly">
									<div class="card border-success mb-3" style="max-width: 18rem; width: 20rem; text-align: center">
										<div class="card-header">My Book</div>
										<div class="card-body text-success px-5 py-5 fs-1">
											<p class="card-text">15</p>
										</div>
									</div>
									<div class="card border-primary mb-3" style="max-width: 18rem; width: 20rem; text-align: center">
										<div class="card-header">Published Book</div>
										<div class="card-body text-primary px-5 py-5 fs-1">
											<p class="card-text">3</p>
										</div>
									</div>
									<div class="card border-danger mb-3" style="max-width: 18rem; width: 20rem; text-align: center">
										<div class="card-header">Sold</div>
										<div class="card-body text-danger px-5 py-5 fs-1">
											<p class="card-text">14</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Bootstrap % Fontawesome -->
		<script src="./assets/bootstrap/js/popper.min.js"></script>
		<script src="./assets/fontawesome/js/all.js"></script>
		<script src="./assets/js/jquery.min.js"></script>
		<script src="./assets/js/index.js" language="JavaScript" type="text/javascript"></script>
	</body>
</html>
