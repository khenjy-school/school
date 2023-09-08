<div class="main">
    <div class="sect1">
        <h4>Laporan Keluar</h4>
        <div class="button">
            <a href="<?= base_url().'index.php/Member/print_laporan_k'?>" class="print"><span class="fas fa-print"></span> Print</a>
            <a href="<?= base_url().'index.php/Member/excel_laporan_k'?>" class="excel"><span class="fas fa-file-excel"></span> Excel</a>
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
        <?php foreach ($trk as $k) {?>
        <tr>
            <td headers="No."><?= ++$start ?></td>
            <td headers="ID Produk"><?= $k->id_p ?></td>
            <td headers="Nama Produk"><?= $k->nama_produk ?></td>
            <td headers="Tanggal"><?= $k->tanggal ?></td>
            <td headers="Jumlah Barang"><?= $k->jumlah_barang ?></td>
            <td headers="Keterangan"><?= $k->keterangan ?></td>
        </tr>
        <?php }?>
    </table>
    <?php echo $this->pagination->create_links(); ?>
</div>