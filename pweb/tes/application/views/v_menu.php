<table class="table table stripped">
    <tr>
        <td>Foto</td>
        <td>Nama</td>
        <td>Harga</td>
        <td>Kategori</td>
        <td>Harga Jual</td>
        <td>Aksi</td>
    </tr>
    <?php foreach ($menu as $m) : ?>
        <tr>
            <td><?= $m->gambar ?></td>
            <td><?= $m->name ?></td>
            <td><?= $m->harga ?></td>
            <td><?= $m->kategori ?></td>
            <td><?= $m->harga_jual ?></td>
            <td>Edit | Delete</td>
        </tr>
    <?php endforeach; ?>
</table>