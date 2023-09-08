<div class="main">
    <div class="sect1">
        <h4>Laporan Masuk</h4>
        <div class="button">
            <a href="<?= base_url().'index.php/Controller/print_laporan_m'?>" class="print"><span class="fas fa-print"></span> Print</a>
            <a href="<?= base_url().'index.php/Controller/excel_laporan_m'?>" class="excel"><span class="fas fa-file-excel"></span> Excel</a>
        </div>
    </div>
    <table>
        <tr>
            <th>No.</th>
            <th>ID Produk</th>
            <th>Nama Produk</th>
            <th>Tanggal</th>
            <th>Jumlah Barang</th>
            <th>Keterangan</th>
        </tr>
        <?php foreach ($trm as $m) {?>
        <tr>
            <td headers="No."><?= ++$start ?></td>
            <td headers="ID"><?= $m->id_p ?></td>
            <td headers="Nama"><?= $m->nama_produk ?></td>
            <td headers="Tanggal"><?= $m->tanggal ?></td>
            <td headers="Jumlah"><?= $m->jumlah_barang ?></td>
            <td headers="Keterangan"><?= $m->keterangan ?></td>
        </tr>
        <?php }?>
    </table>
    <?php echo $this->pagination->create_links(); ?>
</div>