<div class="col-12">
    <button class="btn btn-primary" data-toggle="modal" data-target="#tambah">
        <i class="fa fa-plus"></i> Tambah Data</button>
</div>
<div class="col-12">
    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Telp</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!$petugas) {
                echo "<tr><td colspan='5' class='text-center'>tidak ada data tersedia</td></tr>";
            }

            foreach ($petugas as $m) :
            ?>
                <tr>
                    <td><?= $m->id_petugas; ?></td>
                    <td><?= $m->nama_petugas; ?></td>
                    <td><?= $m->username; ?></td>
                    <td><?= $m->telp; ?></td>
                    <td><?= $m->level; ?></td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $m->id_petugas; ?>">
                            <i class="fa-solid fa-pencil"></i>
                        </button>

                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $m->id_petugas; ?>">
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
                <h3>Data Petugas</h3>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= site_url("Petugas/tambah"); ?>">
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

                    <div class="form-group">
                        <label>Level </label>
                        <select name="level" class="form-control">
                            <option selected hidden>petugas</option>
                            <option>petugas</option>
                            <option>admin</option>
                        </select>
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
<?php foreach ($petugas as $m) : ?>
    <!-- edit -->
    <div id="edit<?= $m->id_petugas; ?>" class="modal fade">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Edit Data Petugas</h3>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= site_url("Petugas/update"); ?>">
                        <div class="form-group">
                            <label>Id</label>
                            <input type="text" class="form-control" name="id" value="<?= $m->id_petugas; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?= $m->nama_petugas; ?>">
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

                        <div class="form-group">
                            <label>Level </label>
                            <select name="level" class="form-control">
                                <option selected hidden><?= $m->level; ?></option>
                                <option>petugas</option>
                                <option>admin</option>
                            </select>
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
<?php foreach ($petugas as $m) : ?>
    <div id="hapus<?= $m->id_petugas; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Hapus Data</h3>
                </div>
                <div class="modal-body">
                    <h4>Anda ingin menghapus data <?= $m->nama_petugas; ?></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= site_url("petugas/hapus/" . $m->id_petugas); ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>