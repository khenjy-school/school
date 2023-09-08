<base href="<?= base_url(); ?>">
<html>

<head>
    <link rel="stylesheet" href="assets/bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row bg-secondary vh-100">
            <div id="menu" class="col-1 ">
                <div class="text-center mt-4">
                    <h5><b> E-CASH</b></h5>
                </div>

                <div class="text-center d-flex align-items-center 
                    justify-content-center">
                    <a href="<?= site_url('home') ?>" id="link_home" class="pt-2 text-white active">Home</a>
                </div>

                <div class="text-center d-flex align-items-center 
                    justify-content-center">
                    <a href="#" id="link_home" class="pt-2 text-white">Bill</a>
                </div>

                <div class="text-center d-flex align-items-center 
                    justify-content-center">
                    <a href="<?= site_url('keluar'); ?>" id="logout" class="pt-2 text-danger">Log Out</a>
                </div>
            </div>
            <div id="isi" class="col-8">
                <div class="p-3">
                    <h3><b>Categories</b> <small>Menu</small> </h3>
                </div>
                <div class="row p-3">
                    <div class="col-md-3 my-2">
                        <div class="card">
                            <div class="card-body">
                                <h5>Makanan</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 my-2">
                        <div class="card">
                            <div class="card-body">
                                <h5>Minuman</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <h3><b>Daftar</b> <small>Menu</small> </h3>
                </div>
                <div class="row p-3 border">
                    <?php foreach ($menu as $m) { ?>
                        <div class="col-md-3 my-2">
                            <div class="card">
                                <img src="<?= base_url('assets/upload/' . $m->gambar) ?>" alt="..." class="card-img img-thumbnail menushow">
                                <div class="card-body">
                                    <h5><?php echo $m->nama ?></h5>

                                    <a class="btn btn-primary">Tambah</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div id="rincian" class="col-3">
                <div class="pl-3 pr-3 mt-3">
                    <h3><b>Order</b> <small>List</small> </h3>
                </div>
                <div class="pl-3 pr-3 mt-3">
                    <table class=" ">
                        <tr>
                            <td colspan="3"> <b>Nama Menu</b> </td>
                        </tr>
                        <tr>
                            <td width="200">Harga</td>
                            <td width="50">3x</td>
                            <td align="right" width="150">Rp. 40.000,00</td>
                        </tr>

                        <tr class="" style="height: 100px;">
                            <td colspan="2" width="250">Subtotal</td>
                            <td align="right" style="color: magenta;" width="150">Rp. 160.000,00</td>
                        </tr>
                    </table>
                </div>
                <div id="btn" class="d-flex align-items-center 
                    justify-content-center">
                    <button name="btn" class="btn btn-primary btn-sm mt-2" type="submit">CONFIRM</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="assets/bs/jquery.min.js"></script>
    <script type="text/javascript" src="assets/bs/js/bootstrap.min.js"></script>
</body>

</html>