<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">

	<title><?= /** @var string $title */
		$title ?></title>
	<style>
		@media (min-width: 992px) and (max-width: 1200px) {
			main .container h1.display-4.font-weight-bold {
				font-size: 50px;
			}
		}

		@media (min-width: 768px) and (max-width: 992px) {
			main .container h1.display-4.font-weight-bold {
				font-size: 40px;
			}

			main .container #main table button.btn.badge {
				margin: 0!important;
				font-size: 15px;
			}

			main .container #main table a.badge {
				margin: 0!important;
				font-size: 15px;
			}
		}

		@media (min-width: 576px) and (max-width: 768px) {
			main .container h1.display-4.font-weight-bold {
				font-size: 30px;
			}

			main .container #main table button.btn.badge {
				margin: 0!important;
				font-size: 15px;
			}

			main .container #main table a.badge {
				margin: 0!important;
				font-size: 13px;
			}

			main .container #main table td p {
				font-size: 13px;
			}

			main .container #main table th {
				font-size: 13px;
			}

			main .container p.lead {
				font-size: 20px
			}

			main .container span.badge {
				font-size: 15px;
			}

			main .container a.btn.btn-lg {
				font-size: 18px;
			}
		}

		@media (min-width: 425px) and (max-width: 576px) {
			main .container h1.display-4.font-weight-bold {
				font-size: 25px;
			}

			main .container h1.display-3.font-weight-bold {
				font-size: 30px;
			}

			main .container p.lead {
				font-size: 18px
			}

			main .container #main .card {
				width: 400px!important;
			}

			main .container span.badge {
				font-size: 13px;
			}

			main .container h4 {
				font-size: 13px;
			}

			main .container a.btn.btn-lg {
				font-size: 13px;
			}

			main .container #main table button.btn.badge {
				margin: 0!important;
				font-size: 13px;
			}

			main .container #main table a.badge {
				margin: 0!important;
				font-size: 13px;
			}

			main .container #main table td {
				font-size: 13px;
				padding: 8px!important;
			}

			main .container #main table th {
				font-size: 13px;
				padding: 8px!important;
			}
		}

		@media (min-width: 320px) and (max-width: 425px) {
			main .container h1.display-4.font-weight-bold {
				font-size: 20px;
			}

			main .container h1.display-3.font-weight-bold {
				font-size: 30px;
			}

			main .container p.lead {
				font-size: 15px
			}

			main .container #main .card {
				width: 300px!important;
			}

			main .container span.badge {
				font-size: 10px;
			}

			main .container h3.mt-3 {
				font-size: 25px;
			}

			main .container h4 {
				font-size: 10px;
			}

			main .container a.btn.btn-lg {
				font-size: 9px;
			}

			main .container #main table button.btn.badge {
				margin: 0!important;
				font-size: 9px;
			}

			main .container #main table a.badge {
				margin: 0!important;
				font-size: 9px;
			}

			main .container #main table td {
				font-size: 9px;
				padding: 6px!important;
			}

			main .container #main table th {
				font-size: 9px;
				padding: 6px!important;
			}

		}

		@media (max-width: 320px) {
			main .container h1.display-4.font-weight-bold {
				font-size: 17px;
			}

			main .container p.lead {
				font-size: 15px
			}

			main .container span.badge {
				font-size: 10px;
			}

			main .container #main .card {
				width: 275px!important;
			}


			main .container h4 {
				font-size: 10px;
			}

			main .container a.btn.btn-lg {
				font-size: 12px;
			}

			footer .container {
				font-size: 15px;
			}

			main .container a.btn.btn-lg {
				font-size: 9px;
			}

			main .container #main table button.btn.badge {
				margin: 0!important;
				font-size: 9px;
			}

			main .container #main table a.badge {
				margin: 0!important;
				font-size: 9px;
			}

			main .container #main table td {
				font-size: 9px;
				padding: 6px!important;
			}

			main .container #main table th {
				font-size: 9px;
				padding: 6px!important;
			}
		}

	</style>
</head>
<body>
<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand font-weight-bold" href="<?= base_url() ?>">Arthur</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url() ?>About">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url() ?>Mahasiswa">Mahasiswa</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
