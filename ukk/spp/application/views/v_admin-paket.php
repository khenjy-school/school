<?php if ($this->session->userdata('akses') <> 'admin') {
  redirect(site_url('welcome/no_akses'));
} ?>

<h1>Daftar <?= $judul ?></h1>
<hr>
<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>

<table class="table table-light" id="data">
  <thead class="thead-light">
    <tr>
      <th>Id <?= $judul ?></th>
      <th>Jenis <?= $judul ?></th>
      <th>Nama <?= $judul ?></th>
      <th>Harga</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($paket as $pk) : ?>
      <tr>
        <td><?= $pk->id_paket; ?></td>
        <td><?= $pk->jenis ?></td>
        <td><?= $pk->nama_paket ?></td>
        <td><?= $pk->harga ?></td>
        <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $pk->id_paket; ?>">
            <i class="fas fa-eye"></i></a>
          <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $pk->id_paket; ?>">
            <i class="fas fa-edit"></i></a>
          <a class="btn btn-light text-danger" onclick="return confirm('Hapus data paket?')" href="<?= site_url('paket/hapus/' . $pk->id_paket) ?>">
            <i class="fas fa-trash"></i></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
  <tfoot>
    <tr>
      <th>Id <?= $judul ?></th>
      <th>Jenis <?= $judul ?></th>
      <th>Nama <?= $judul ?></th>
      <th>Harga</th>
      <th>Aksi</th>
    </tr>
  </tfoot>


</table>

<!-- modal tambah -->
<div id="tambah" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah <?= $judul ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <form action="<?= site_url('paket/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label>Jenis <?= $judul ?></label>
            <select class="form-control" required name="jenis">
              <option selected hidden value="">Pilih Jenis...</option>
              <option value="kiloan">Kiloan</option>
              <option value="bed_cover">Bed Cover</option>
              <option value="kaos">Kaos</option>
              <option value="lain">Lainnya</option>
            </select>
          </div>

          <div class="form-group">
            <label>Nama <?= $judul ?></label>
            <input class="form-control" type="text" required name="nama_paket" placeholder="Masukkan jenis paket">
            <input type="hidden" name="id_outlet" value="<?= $this->session->userdata('id_outlet') ?>">
          </div>

          <div class="form-group">
            <label>Harga <?= $judul ?></label>
            <input class="form-control" type="text" required name="harga" placeholder="Masukkan harga paket">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal edit -->
<?php foreach ($paket as $pk) : ?>
  <div id="ubah<?= $pk->id_paket; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $judul ?> <?= $pk->id_paket; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('paket/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label>Jenis <?= $judul ?></label>
              <select class="form-control" required name="jenis">
                <option selected hidden value="<?= $pk->jenis ?>"><?= $pk->jenis ?></option>
                <option value="kiloan">Kiloan</option>
                <option value="bed_cover">Bed Cover</option>
                <option value="kaos">Kaos</option>
                <option value="lain">Lainnya</option>
              </select>
              <input type="hidden" name="id_paket" value="<?= $pk->id_paket; ?>">
            </div>

            <div class="form-group">
              <label>Nama <?= $judul ?></label>
              <input class="form-control" type="text" required name="nama_paket" value="<?= $pk->nama_paket; ?>">
            </div>

            <div class="form-group">
              <label>Harga <?= $judul ?></label>
              <input class="form-control" type="text" required name="harga" value="<?= $pk->harga; ?>">
            </div>

          </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal lihat -->
<?php foreach ($paket as $pk) : ?>
  <div id="lihat<?= $pk->id_paket; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $judul ?> <?= $pk->id_paket; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form>
          <div class="modal-body">
            <div class="form-group">
              <label>Jenis <?= $judul ?> : </label>
              <p><?= $pk->jenis; ?></p>
            </div>

            <div class="form-group">
              <label>Nama <?= $judul ?> : </label>
              <p><?= $pk->nama_paket; ?></p>
            </div>

            <div class="form-group">
              <label>Harga <?= $judul ?> : </label>
              <p><?= $pk->harga; ?></p>
            </div>


          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>