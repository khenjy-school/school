<div class="main">
<?= $this->session->flashdata('message','username');?>
        <div class="row">
            <div class="col-sm bg-info rounded bord">
                    <span class="fas fa-box icon"></span>
                    <div class="number"><?= $row_p?></div>
                    <h5>Produk</h5>
                    <a href="<?= base_url('index.php/Controller/dt_p')?>"><span class="fa fa-search"></span></a>
            </div>
            <div class="col-sm bg-info rounded">
                <div>
                    <span class="fas fa-file-invoice-dollar icon"></span>
                    <div class="number"><?= $row_trm?></div>
                    <h5>Transaksi Masuk</h5>
                    <a href="<?= base_url('index.php/Controller/tr_m')?>"><span class="fa fa-search"></span></a>
                </div>
            </div>
            <div class="col-sm bg-info rounded">
                <div>
                    <span class="fas fa-file-invoice-dollar icon"></span>
                    <div class="number"><?= $row_trk?></div>
                    <h5>Transaksi Keluar</h5>
                    <a href="<?= base_url('index.php/Controller/tr_k')?>"><span class="fa fa-search" ></span></a>
                </div>
            </div>
            <div class="col-sm bg-info rounded">
                <div>
                    <span class="fas fa-user icon"></span>
                    <div class="number"><?= $row_u?></div>
                    <h5>Pengguna</h5>
                    <a href="<?= base_url('index.php/Controller/users')?>"><span class="fa fa-search" ></span></a>
                </div>
            </div>
        </div>
    </div>