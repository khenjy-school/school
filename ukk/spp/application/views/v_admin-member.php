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
      <th>Nama</th>
      <th>Alamat</th>
      <th>Jenis Kelamin</th>
      <th>Telepon</th>
      <th>Aksi</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($member as $m) : ?>
      <tr>
        <td><?= $m->id_member; ?></td>
        <td><?= $m->nama; ?></td>
        <td><?= $m->alamat; ?></td>
        <td><?= $m->jenis_kelamin; ?></td>
        <td><?= $m->tlp; ?></td>
        <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $m->id_member; ?>">
            <i class="fas fa-eye"></i></a>
          <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $m->id_member; ?>">
            <i class="fas fa-edit"></i></a>
          <a class="btn btn-light text-danger" onclick="return confirm('Hapus data fasilitas?')" href="<?= site_url('member/hapus/' . $m->id_member) ?>">
            <i class="fas fa-trash"></i></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>

  <tfoot>
    <tr>
      <th>Id <?= $judul ?></th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Jenis Kelamin</th>
      <th>Telepon</th>
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

      <form action="<?= site_url('member/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <div class="form-group">
            <label>Nama</label>
            <input class="form-control" type="text" required name="nama" placeholder="Masukkan nama">
          </div>

          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" required name="alamat" rows="3" placeholder="Masukkan alamat member"></textarea>
          </div>

          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control" required name="jenis_kelamin">
              <option value="" selected hidden>Pilih jenis kelamin...</option>
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>

          <div class="form-group">
            <label>Telepon</label>
            <textarea class="form-control" required name="tlp" rows="3" placeholder="Masukkan telepon"></textarea>
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
<?php foreach ($member as $m) : ?>
  <div id="ubah<?= $m->id_member; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $judul ?> <?= $m->id_member; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('member/update') ?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label>Nama</label>
              <input class="form-control" type="text" required name="nama" value="<?= $m->nama ?>">
            </div>

            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" required name="alamat" rows="3"><?= $m->alamat ?></textarea>
            </div>

            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="form-control" required name="jenis_kelamin">
                <option selected hidden><?= $m->jenis_kelamin; ?></option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>

            <div class="form-group">
              <label>Telepon</label>
              <input class="form-control" type="text" required name="tlp" value="<?= $m->tlp ?>">
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

<!-- Modal lihat -->
<?php foreach ($member as $m) : ?>
  <div id="lihat<?= $m->id_member; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $judul ?> <?= $m->id_member; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form>
          <div class="modal-body">
            <div class="form-group">
              <label>Nama <?= $judul ?> : </label>
              <p><?= $m->nama; ?></p>
            </div>
            <div class="form-group">
              <label>Alamat : </label>
              <p><?= $m->alamat; ?></p>
            </div>
            <div class="form-group">
              <label>Jenis Kelamin : </label>
              <p><?= $m->jenis_kelamin; ?></p>
            </div>
            <div class="form-group">
              <label>Nomor Telepon : </label>
              <p><?= $m->tlp; ?></p>
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