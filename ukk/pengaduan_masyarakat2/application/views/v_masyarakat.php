<div class="col-12">
    <button class="btn btn-primary" data-toggle="modal" data-target="#tambah">
        <i class="fa fa-plus"></i> Tambah Data</button>
</div>
<div class="col-12">
    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th>Nik</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Telp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!$masyarakat) {
                echo "<tr><td colspan='5' class='text-center'>tidak ada data tersedia</td></tr>";
            }

            foreach ($masyarakat as $m) :
            ?>
                <tr>
                    <td><?= $m->nik; ?></td>
                    <td><?= $m->nama; ?></td>
                    <td><?= $m->username; ?></td>
                    <td><?= $m->telp; ?></td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $m->nik; ?>">
                            <i class="fa-solid fa-pencil"></i>
                        </button>

                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $m->nik; ?>">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- tambah data -->
<div id="tambah" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Data Masyarakat</h3>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= site_url("Masyarakat/tambah"); ?>">
                    <div class="form-group">
                        <label>Nik</label>
                        <input type="text" class="form-control" name="nik" placeholder="ex: 196010">
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="ex: billy Fernando">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="uname" placeholder="ex:poo123">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="pass">
                    </div>

                    <div class="form-group">
                        <label>No Telpon </label>
                        <input type="text" class="form-control" name="telp" placeholder="ex: 0812444444444">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit data -->
<?php foreach ($masyarakat as $m) : ?>
    <!-- edit -->
    <div id="edit<?= $m->nik; ?>" class="modal fade">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Edit Data Masyarakat</h3>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= site_url("Masyarakat/update"); ?>">
                        <div class="form-group">
                            <label>Nik</label>
                            <input type="text" class="form-control" name="nik" value="<?= $m->nik; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?= $m->nama; ?>">
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="uname" value="<?= $m->username; ?>">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="pass" value="<?= $m->password; ?>">
                        </div>

                        <div class="form-group">
                            <label>No Telpon </label>
                            <input type="text" class="form-control" name="telp" value="<?= $m->telp; ?>">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- hapus -->
<?php foreach ($masyarakat as $m) : ?>
    <div id="hapus<?= $m->nik; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Hapus Data</h3>
                </div>
                <div class="modal-body">
                    <h4>Anda ingin menghapus data <?= $m->nama; ?></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= site_url("masyarakat/hapus/" . $m->nik); ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>