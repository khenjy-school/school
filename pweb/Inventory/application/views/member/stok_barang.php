<div class="main">
    <div class="sect1">
        <h4>Stok Barang</h4>
        <div class="button">
            <a href="<?= base_url().'index.php/Member/print_stok'?>" class="print"><span class="fas fa-print"></span> Print</a>
            <a href="<?= base_url().'index.php/Member/excel_stok'?>" class="excel"><span class="fas fa-file-excel"></span> Excel</a>
        </div>
    </div>
    <table>
        <tr>
            <th>No.</th>
            <th>ID Produk</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Merek</th>
            <th>Stok</th>
            <th>Gambar</th>
        </tr>
        <?php foreach ($stok as $s) {?>
        <tr>
            <td headers="No."><?= ++$start ?>.</td>
            <td headers="ID"><?= $s->id_p ?></td>
            <td headers="Nama"><?= $s->nama_produk ?></td>
            <td headers="Kategori"><?= $s->kategori ?></td>
            <td headers="Merek"><?= $s->merek ?></td>
            <td headers="Stok"><?= $s->stok ?></td>
            <td headers="Gambar"><img src="<?= base_url().'img/'.$s->img?>"></td>
        </tr>
        <?php }?>
    </table>
    <?php echo $this->pagination->create_links(); ?>
</div>