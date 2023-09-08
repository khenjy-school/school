<html>
    <head>
        <title><?= $head?></title>
    </head>
    <body>
    <h2><?= $title ?></h2>
    <h3><?= $subtitle ?></h3>
    <table>
        <tr>
            <th>No.</th>
            <th>ID Produk</th>
            <th>Nama Produk</th>
            <th>Tanggal</th>
            <th>Jumlah Barang</th>
        </tr>
        <?php $no=1; 
        foreach ($datafilter as $index => $d) {?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $d->id_p ?></td>
            <td><?= $join[$index]->nama_produk ?></td>
            <td><?= $d->tanggal ?></td>
            <td><?= $d->jumlah_barang ?></td>
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