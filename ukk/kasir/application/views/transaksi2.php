<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?php echo base_url("assets/bs/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/fontawesome/css/all.css"); ?>">
</head>

<body>
    <div class="container">
        <div class="left_Side">

            <div class="bgmenu row">
                <?php foreach ($menu as $m) { ?>
                    <div class="col-md-auto my-2">
                        <div class="card" style="width: 16rem;">
                            <div class="card-header">
                                <h5>
                                    <?php echo $m->nama ?>
                                </h5>
                            </div>
                            <img src="<?= base_url('assets/upload/' . $m->gambar) ?>" alt="..." class="card-img img-thumbnail menushow">
                            <div class="card-body">
                                <input name="idmenu" type="hidden" value="<?= $m->id_menu ?>">
                                <input type="text" name="jumlah" style="width: 40pt;" id="" placeholder="qty">
                                <a class="btn btn-primary">Tambah</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>

        <div class="right_Side">
            <div class="pl-3 pr-3 mt-3">
                <h3><b>Order</b> <small>List</small> </h3>
            </div>
            <div class="pl-3 pr-3 mt-3">
                <table class=" ">
                    <?php foreach ($pesanan as $p) : ?>
                        <tr>
                            <td colspan="3"> <b>Nama Menu</b> </td>
                        </tr>
                        <tr>
                            <td width="200">Harga</td>
                            <td width="50">3x</td>
                            <td align="right" width="150">Rp. 40.000,00</td>
                        </tr>
                    <?php endforeach; ?>


                    <tr class="" style="height: 100px;">
                        <td colspan="2" width="250">Subtotal</td>
                        <td align="right" style="color: magenta;" width="150">Rp. 160.000,00</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script>
        $('#pills-tab').on('click', function(event) {
            event.preventDefault()
            $('#myTab a[href="#home"]').tab('show') // Select tab by name
            $('#myTab li:first-child a').tab('show') // Select first tab
            $('#myTab li:last-child a').tab('show') // Select last tab
            $('#myTab li:nth-child(3) a').tab('show') // Select third tab
        })
    </script>
</body>

</html>