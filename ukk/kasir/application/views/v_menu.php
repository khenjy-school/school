<div class="row pt-3 pb-3">
    <div class="col-12">
        <a href="<?= site_url("menu/baru"); ?>" class="btn btn-success">Data Baru</a>
    </div>
</div>
<div class="row mt-2">
    <div class="col-12">
        <table id="datamenu" class="table table-striped">
            <thead>
                <tr>
                    <td>Foto</td>
                    <td>Nama</td>
                    <td>Harga</td>
                    <td>Kategori</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menu as $m) : ?>
                    <tr>
                        <td><img src="assets/upload/<?= $m->gambar; ?>" height="100"></td>
                        <td><?= $m->nama; ?></td>
                        <td><?= $m->harga_jual; ?></td>
                        <td><?= $m->kategori; ?></td>
                        <td>
                            <a href="<?= site_url("menu/edit/" . $m->id_menu); ?>" class="btn btn-warning">Edit</a>
                            <a href="<?= site_url("menu/delete/" . $m->id_menu); ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>