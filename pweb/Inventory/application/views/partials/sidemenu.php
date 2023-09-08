<input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="sidemenu">
            <div class="menu">
                <a href="<?= base_url('index.php/Controller') ?>">
                    <label>Home</label>
                </a>
            </div>
            <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">
            Data Barang
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?= base_url('index.php/Controller/dt_p') ?>">Data Produk</a>
            <a class="dropdown-item" href="<?= base_url('index.php/Controller/merek') ?>">Merek</a>
            <a class="dropdown-item" href="<?= base_url('index.php/Controller/kategori') ?>">Kategori</a>
        </div>
        </div>
        <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">
            Transaksi
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?= base_url('index.php/Controller/tr_m') ?>">Transaksi Masuk</a>
            <a class="dropdown-item" href="<?= base_url('index.php/Controller/tr_k') ?>">Transaksi Keluar</a>
        </div>
        </div>
        <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">
            Laporan
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?= base_url('index.php/Controller/stok') ?>">Stok Barang</a>
            <a class="dropdown-item" href="<?= base_url('index.php/Controller/lp_m') ?>">Laporan Masuk</a>
            <a class="dropdown-item" href="<?= base_url('index.php/Controller/lp_k') ?>">Laporan Keluar</a>
        </div>
        </div>
        <div class="menu">
            <a href="<?= base_url('index.php/Controller/users')?>">
                <label>Users</label>
            </a>
        </div>
        <div class="menu">
            <a href="<?= base_url('index.php/Controller/settings')?>">
                <label>Settings</label>
            </a>
        </div>
        </div>
    </div>
</body>