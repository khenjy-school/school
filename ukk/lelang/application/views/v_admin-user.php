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
      <th>Nama <?= $judul ?></th>
      <th>Username</th>
      <th>Role</th>
      <th>Aksi</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($user as $u) : ?>
      <tr>
        <td><?= $u->id_user; ?></td>
        <td><?= $u->nama ?></td>
        <td><?= $u->username ?></td>
        <td><?= $u->role ?></td>
        <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $u->id_user; ?>">
            <i class="fas fa-eye"></i></a>
          <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $u->id_user; ?>">
            <i class="fas fa-edit"></i></a>
          <a class="btn btn-light text-danger" onclick="return confirm('Hapus user?')" href="<?= site_url('user/hapus/' . $u->id_user) ?>">
            <i class="fas fa-trash"></i></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>

  <tfoot>
    <tr>
      <th>Id <?= $judul ?></th>
      <th>Nama <?= $judul ?></th>
      <th>Username</th>
      <th>Role</th>
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

      <form action="<?= site_url('user/tambah') ?>" method="post">
        <div class="modal-body">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input class="form-control" type="text" required name="nama" placeholder="Masukkan nama">
            <input type="hidden" name="id_outlet" value="<?= $this->session->userdata('id_outlet') ?>">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input class="form-control" type="text" required name="username" placeholder="Masukkan username">
          </div>

          <!-- administrator dapat menentukan password untuk akun baru -->
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control" type="password" required name="password" placeholder="Masukkan password">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control" type="password" required name="konfirm" placeholder="Konfirmasi password">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-users"></i></span>
            </div>

            <!-- hanya admin yang bisa menentukan role user -->
            <select class="form-control" required name="role">
              <option value="" selected hidden>Pilih Role <?= $judul ?></option>
              <option value="kasir">Kasir</option>
              <option value="admin">Admin</option>
              <option value="owner">Owner</option>
            </select>
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
<?php foreach ($user as $u) : ?>
  <div id="ubah<?= $u->id_user; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $judul ?> <?= $u->id_user; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak dapat mengubah password akun lain -->
        <form action="<?= site_url('user/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input class="form-control" type="text" required name="nama" value="<?= $u->nama; ?>">
              <input type="hidden" name="id_user" value="<?= $u->id_user; ?>">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input class="form-control" type="text" required name="username" value="<?= $u->username; ?>">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-users"></i></span>
              </div>
              <select class="form-control" required name="role">
                <option selected hidden><?= $u->role; ?></option>
                <option value="kasir">Kasir</option>
                <option value="admin">Admin</option>
                <option value="owner">Owner</option>
              </select>
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
<?php foreach ($user as $u) : ?>
  <div id="lihat<?= $u->id_user; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $judul ?> <?= $u->id_user; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label>Nama <?= $judul ?> : </label>
              <p><?= $u->nama; ?></p>
            </div>

            <div class="form-group">
              <label>Username : </label>
              <p><?= $u->username; ?></p>
            </div>

            <div class="form-group">
              <label>Role <?= $judul ?> : </label>
              <p><?= $u->role; ?></p>
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