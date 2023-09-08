<div class="col-12">
    <button class="btn btn-primary" data-toggle="modal" data-target="#tambah">
        <i class="fa fa-plus"></i> Tambah Pengaduan</button>
</div>
<div class="col-12">
    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th>id</th>
                <th>Tanggal</th>
                <th>Laporan</th>
                <th>Foto</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!$pengaduan) {
                echo "<tr><td colspan='5' class='text-center'>tidak ada data tersedia</td></tr>";
            }
            foreach ($pengaduan as $p) :
            ?>
                <tr>
                    <td><?= $p->id_pengaduan; ?></td>
                    <td><?= $p->tgl_pengaduan; ?></td>
                    <td><?= $p->isi_laporan; ?></td>
                    <td><img class="rounded" src="<?php echo base_url('assets/upload/' . $p->foto) ?>" width="128"></td>
                    <td><?= $p->status; ?></td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $p->id_pengaduan; ?>"><i class="fa fa-pen"></i></button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $p->id_pengaduan; ?>"><i class="fa fa-trash"></i>
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
                <h3>Pengaduan Baru</h3>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= site_url("pengaduan/tambah"); ?>" enctype="multipart/form-data">


                    <div class="form-group">
                        <label>Laporan</label>
                        <Textarea class="form-control" name="laporan"></Textarea>
                    </div>

                    <div class="form-group">
                        <label>Foto </label>
                        <input type="file" class="form-control-file" name="foto" placeholder="ex: 0812444444444">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- hapus -->
<?php foreach ($pengaduan as $p) : ?>
    <div id="hapus<?= $p->id_pengaduan; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Hapus data</h3>
                </div>
                <div class="modal-body">
                    <h4>Anda ingin menghapus data <?= $p->id_pengaduan; ?>?</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                    <a href="<?= site_url("pengaduan/hapus/" . $p->id_pengaduan); ?>" class="btn btn-danger">hapus</a>
                </div>

            </div>
        </div>
    </div>
    </div>
<?php endforeach; ?>