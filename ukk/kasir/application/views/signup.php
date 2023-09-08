<base href="<?php echo base_url(); ?>">
<html>

<head>
    <!-- bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- fotawesome -->
    <link href="assets/fontawesome/css/all.css" rel="stylesheet">

    <!-- Custom css -->
    <link href="assets/css/style.css" rel="stylesheet">
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
                    <img src="assets/img/kopi3.png" alt="">
                </div>
                <div class="border text-center pt-5" id="form">
                    <span style="font-size: 20pt;"><b>BISA-NGOPI.com</b></span><br>
                    <small style="font-size: 10pt;">SILAHKAN BUAT AKUN TERLEBIH DAHULU</small>
                    <form method="post" action="<?= site_url("welcome/user_simpan") ?>">
                        <input type="text" class="mt-3 inputbx form-control" name="nama" placeholder="Masukkan nama">
                        <input type="text" class="mt-3 inputbx form-control" name="uname" placeholder="Masukkan username">
                        <input type="password" class="mt-2 inputbx form-control" name="pass" id="pass" placeholder="Masukkan password">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" onclick="password_show_hide();">
                            <label class="form-check-label" for="exampleCheck1">Show Password</label>
                        </div>
                        <input type="password" class="mt-2 inputbx form-control" name="confirm" id="confirm" placeholder="Konfirmasi password">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="confirm_show_hide();">
                            <label class="form-check-label" for="exampleCheck1">Show Password</label>
                        </div>
                        <button name="btn" class="btn btn-primary btn-sm mt-2" type="submit">Sign Up</button>
                        <small>Belum punya akun? <span><a href="<?= site_url('signup'); ?>">Sign Up</a> </span></small>
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

        function password_show_hide() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function confirm_show_hide() {
            var c = document.getElementById("confirm");
            if (c.type === "password") {
                c.type = "text";
            } else {
                c.type = "password";
            }
        }
    </script>

</body>

</html>