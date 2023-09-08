<html>
    <head>
        <title>Laporan Stok Barang</title>
    </head>
    <body>
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
        <?php $no=1; foreach ($stok as $s) {?>
        <tr>
            <td><?= $no++ ?>.</td>
            <td><?= $s->id_p ?></td>
            <td><?= $s->nama_produk ?></td>
            <td><?= $s->kategori ?></td>
            <td><?= $s->merek ?></td>
            <td><?= $s->stok ?></td>
            <td><img src="<?= base_url().'img/'.$s->img?>"></td>
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
    img{
        width: 50px;
        height: 50px;
    }
</style>
</html>