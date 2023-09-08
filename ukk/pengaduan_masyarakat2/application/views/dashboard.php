<base href="<?php echo base_url(); ?>">
<?php
if (!$this->session->userdata("nama")) {
	$this->session->set_flashdata('pesan', '<span class="text-success"><i class="far fa-check-square"></i>Anda tidak memiliki akses ke halaman ini!</span>');
	$this->session->set_flashdata('panggil', '$(".toast").toast("show")');
	redirect(site_url("welcome"));
}
?>
<html>

<head>
	<!-- bootstrap -->
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- fotawesome -->
	<link href="assets/fontawesome/css/all.css" rel="stylesheet">

	<!-- Custom css -->
	<link href="assets/css/dashboard.css" rel="stylesheet">
</head>

<body>
	<div class="container-fluid bg-dark h-100">
		<div class="row">
			<div class="col-2 bg-info vh-100">
				<div class=" text-white text-center font-weight-bold mt-4">Pengaduan Masyarakat</div>
				<div class=" text-center"><img class="mt-3 rounded-circle" src="assets/img/biscuits.jpg" width="100"></div>
				<div class=" text-white text-center ">
					<?= $this->session->userdata("nama") ?>
				</div>
				<div class=" text-white text-center"><small class="font-weight-bold">
						<?= $this->session->userdata("akses") ?>
					</small></div>
				<div id="menu" class="d-flex flex-column mt-3">
					<?php
					$this->load->view("menu_" . $this->session->userdata("akses"));
					?>

				</div>
			</div>

			<!--konten-->

			<div class="col-10 bg-light">
				<div id="notif" class="bg-light shadow-sm row d-flex flex-row-reverse align-items-center align-self-center">
					<div class="mr-3">
						<img class="rounded-circle" src="assets/img/biscuits.jpg" width="30">
					</div>

					<div class="mr-3">
						<i class="fas fa-bell mr-1"> </i> <span class="badge badge-danger">
							<?php
							echo $this->db->query("select * from pengaduan where status='proses'")->num_rows();
							?>
						</span>

					</div>

				</div>

				<div id="isi" class="">
					<div id="judul" class=" mt-3">
						<h3><?= $title; ?></h3>
						<ol class="breadcrumb bg-light">
							<li class="breadcrumb-item"><a href="#">home</a></li>
							<li class="breadcrumb-item active">Beranda</a></li>
						</ol>
					</div>

					<div id="konten" class=" row">
						<!--- notifikasi --->
						<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="position: absolute;top:15;right:15">
							<div class="toast-header">
								<strong>Notifikasi</strong>
							</div>
							<div class="toast-body">
								<?= $this->session->flashdata('pesan'); ?>
							</div>
						</div>
						<!--- load konten --->
						<?php $this->load->view($konten); ?>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- jquery -->
	<script src="assets/jquery-3.6.0.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- fontawesome-->
	<script src="assets/fontawesome/js/all.js"> </script>

	<script>
		<?= $this->session->flashdata('panggil'); ?>
	</script>

</body>

</html>