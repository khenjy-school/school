<base href="<?= site_url(); ?>">
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
	<div class="row vh-100 bg-dark">
		<div class="col-3 vh1-100 bg-secondary text-white">
			<div class="row">
				<div class="col-12 text-center pt-2 pb-2">
					<h4>PimPimPom</h4>
				</div>
			</div>

			<div class="col-12 text-center">
				gambar <br>
				nama org <br>
				level <br>
			</div>

			<div class="col-12">
				<a href="<?= site_url("menu"); ?>">Daftar Menu</a> <br>
				<a href="<?= site_url("transaksi"); ?>">Transaksi</a> <br>
				<a href="<?= site_url("history"); ?>">History</a> <br>

			</div>
		</div>

		<div class="col-9 bg-light vh-100">
			<div class="row">
				<div class="col-12">
					<h3>Dashboard</h3>
				</div>
				<?php $this->load->view($konten); ?>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="assets/bootstrap/jquery.min.js"></script>
	<script type="text/javascript" src="assets/bootstrap/bootstrap.min.js"></script>
</body>

</html>