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
                    <small style="font-size: 10pt;">SILAHKAN LOGIN TERLEBIH DAHULU</small>
                    <form method="post" action="<?= site_url("welcome/ceklogin") ?>">
                        <input type="text" class="mt-3 inputbx form-control" name="uname" placeholder="Masukkan username">
                        <input type="password" class="mt-2 inputbx form-control" name="pass" id="pass" placeholder="Masukkan password">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="password_show_hide();">
                            <label class="form-check-label" for="exampleCheck1">Show Password</label>
                        </div>
                        <button name="btn" class="btn btn-primary btn-sm mt-2" type="submit">Login</button>
                    </form>
                </div>

            </div>
            <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0;">
                <div id="konten" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                    <div class="toast-header">
                        <strong class="mr-auto">Notifikasi</strong>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        <?= $this->session->flashdata('pesan'); ?>
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

        function password_show_hide() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</body>

</html>