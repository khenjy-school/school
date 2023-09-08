<html>
    <head>
        <title>Laporan Keluar</title>
    </head>
    <body>
    <table border="1">
        <tr>
            <th>No.</th>
            <th>ID Produk</th>
            <th>Nama Produk</th>
            <th>Tanggal</th>
            <th>Jumlah Barang</th>
            <th>Keterangan</th>
        </tr>
        <?php $no=1; foreach ($lp_k as $k) {?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $k->id_p ?></td>
            <td><?= $k->nama_produk ?></td>
            <td><?= $k->tanggal ?></td>
            <td><?= $k->jumlah_barang ?></td>
            <td><?= $k->keterangan ?></td>
        </tr>
        <?php }?>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
    </body>
    <style>
    th,td{
        padding: 5px;
        padding-right: 40px;
    }
</style>
</html>