<base href="<?php echo base_url(); ?>">
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
    <!--- notifikasi --->
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="position: absolute;top:15;right:15">
        <div class="toast-header">
            <strong>Notifikasi</strong>
        </div>
        <div class="toast-body">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>

    <div class="container">
        <div class="row mt-5">
            <div id="loginpanel" class="border shadow-sm rounded mt-5 d-flex">
                <div id="gambar">
                    <img src="assets/img/picture4.jpg" alt="">
                </div>
                <div class="border text-center pt-5" id="form">
                    <span style="font-size: 11pt;"><b>PENGADUAN MASYARAKAT</b></span>
                    <small style="font-size: 8pt;">SILAHKAN LOGIN TERLEBIH DAHULU</small>
                    <form method="post" action="<?= site_url("welcome/ceklogin") ?>">
                        <input type="text" class="mt-3 inputbx form-control" name="uname" placeholder="Masukkan username">
                        <input type="password" class="mt-2 inputbx form-control" name="pass" placeholder="Masukkan password">
                        <button name="btn" class="btn btn-primary btn-sm mt-2" type="submit">Login</button>
                    </form>
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