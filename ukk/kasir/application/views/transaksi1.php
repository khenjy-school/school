<base href="<?= base_url(); ?>">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/transaksi.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row vh-100" style="padding-left: 0; padding-right: 0;">
            <div class="col-2 tran_left">
                <div class="row">
                    <div class="col">
                        <div class="tran_title">BISANGOPI.com</div>
                        <div class="">Home</div>
                    </div>
                </div>
            </div>

            <div class="col-7 text-center">
                <div class="row" style="height: 10vh;">
                    <div class="col">
                        <div class="tran_silakan">Silakan Dipesan</div>
                        <div style="width: 20%;">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="row text-center">
                            <div class="col"></div>
                            <?php foreach ($menu as $m) : ?>
                                <div class="col-3 bord" style="padding-left: 0; padding-right: 0;">
                                    <img class="tran_box1" src="<?= base_url('assets/upload/' . $m->gambar) ?>" alt="">
                                    <div class="tran_nama_menu"><?php echo $m->nama ?></div>
                                    <div class="tran_harga_menu">15.000</div>
                                </div>
                            <?php endforeach; ?>
                            <div class="col"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-3 tran_right" style="padding-left: 0; padding-right: 0;">
                <div class="tran_pesanan">Pesanan</div>
                <a class="btn btn-success tran_beli" href="">Beli</a>
            </div>
        </div>
    </div>
    </div>

    <script type="text/javascript" src="assets/bs/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/bs/jquery.min.js"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
</body>

</html>