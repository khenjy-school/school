<div class="row pt-3 pb-3">
    <div class="col-12">
        <a href="<?= site_url("user/baru"); ?>" class="btn btn-success">Data Baru</a>
    </div>
</div>
<div class="row mt-2">
    <div class="col-12">
        <table id="datamenu" class="table table-striped">
            <thead>
                <tr>
                    <td>Foto</td>
                    <td>ID User</td>
                    <td>Nama</td>
                    <td>Level</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user as $m) : ?>
                    <tr>
                        <td><img src="assets/upload/user/<?= $m->foto; ?>" height="100" style=" border: 2px solid grey"></td>
                        <td><?= $m->id_user; ?></td>
                        <td><?= $m->nama; ?></td>
                        <td><?= $m->level; ?></td>
                        <td>
                            <a href="<?= site_url("user/edit/" . $m->id_user); ?>" class="btn btn-warning">Edit</a>
                            <a href="<?= site_url("user/delete/" . $m->id_user); ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>