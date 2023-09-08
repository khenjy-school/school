<html>
    <head>
        <title>Laporan Masuk</title>
    </head>
    <body>
    <table>
        <tr>
            <th>No.</th>
            <th>ID Produk</th>
            <th>Nama Produk</th>
            <th>Tanggal</th>
            <th>Jumlah Barang</th>
            <th>Keterangan</th>
        </tr>
        <?php $no=1; foreach ($lp_m as $m) {?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $m->id_p ?></td>
            <td><?= $m->nama_produk ?></td>
            <td><?= $m->tanggal ?></td>
            <td><?= $m->jumlah_barang ?></td>
            <td><?= $m->keterangan ?></td>
        </tr>
        <?php }?>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
    </body>
    <style>
    table,th,td{
        border: 1px solid black;
    }
    th,td{
        padding: 5px;
        padding-right: 40px;
    }
</style>
</html>