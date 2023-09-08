<!-- mengarahkan ke no_akses jika akses user bukan admin -->
<?php if ($this->session->userdata('akses') <> 'admin') {
  redirect(site_url('welcome/no_akses'));
} ?>

<h1>Daftar <?= $judul ?></h1>
<hr>

<!-- menampilkan modal tambah -->
<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>

<!-- tabel data outlet -->
<table class="table table-light" id="data">

  <!-- header tabel -->
  <thead class="thead-light">
    <tr>
      <th>Id <?= $judul ?></th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Telepon</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>

    <!-- menampilkan setiap baris data outlet sebagai o dalam tabel -->
    <?php foreach ($outlet as $o) : ?>
      <tr>
        <td><?= $o->id_outlet; ?></td>
        <td><?= $o->nama ?></td>
        <td><?= $o->alamat ?></td>
        <td><?= $o->tlp ?></td>

        <!-- menampilkan modal lihat data berdasarkan id -->
        <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $o->id_outlet; ?>">
            <i class="fas fa-eye"></i></a>

          <!-- menampilkan modal ubah data berdasarkan id -->
          <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $o->id_outlet; ?>">
            <i class="fas fa-edit"></i></a>

          <!-- menghapus data berdasarkan id -->
          <a class="btn btn-light text-danger" type="button" onclick="return confirm('Hapus data outlet?')" href="<?= site_url('outlet/hapus/' . $o->id_outlet) ?>">
            <i class="fas fa-trash"></i></a>

        </td>
      </tr>
    <?php endforeach; ?>

  </tbody>

  <!-- footer tabel -->
  <tfoot>
    <tr>
      <th>Id <?= $judul ?></th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Telepon</th>
      <th>Aksi</th>
    </tr>
  </tfoot>

</table>

<!-- modal tambah -->
<div id="tambah" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- header modal -->
      <div class="modal-header">

        <h5 class="modal-title">Tambah <?= $judul ?></h5>

        <!-- tombol tutup modal -->
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>

      </div>

      <!-- form tambah yang bisa menginput gambar -->
      <form action="<?= site_url('outlet/tambah') ?>" method="post" enctype="multipart/form-data">

        <!-- isi modal -->
        <div class="modal-body">
          <div class="form-group">
            <label>Nama <?= $judul ?></label>
            <input class="form-control" type="text" required name="nama" placeholder="Masukkan nama <?= $judul ?>">
          </div>

          <div class="form-group">
            <label>Alamat <?= $judul ?></label>
            <textarea class="form-control" required name="alamat" rows="3" placeholder="Masukkan alamat"></textarea>
          </div>

          <div class="form-group">
            <label>Nomor Telepon</label>
            <input class="form-control" type="text" required name="tlp" placeholder="Masukkan nomor telepon">
          </div>
        </div>

        <!-- footer modal -->
        <div class="modal-footer">

          <!-- tombol simpan data -->
          <button class="btn btn-success" type="submit">Simpan</button>

        </div>

      </form>

    </div>
  </div>
</div>

<!-- menampilkan data outlet sebagai o dalam modal -->
<?php foreach ($outlet as $o) : ?>

  <!-- modal edit -->
  <div id="ubah<?= $o->id_outlet; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- header modal -->
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $judul ?> <?= $o->id_outlet; ?></h5>

          <!-- tombol tutup modal -->
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>

        </div>

        <!-- form edit -->
        <form action="<?= site_url('outlet/update') ?>" method="post" enctype="multipart/form-data">

          <!-- isi modal -->
          <div class="modal-body">
            <div class="form-group">
              <label>Nama <?= $judul ?></label>
              <input class="form-control" type="text" required name="nama" value="<?= $o->nama; ?>">
              <input type="hidden" name="id_outlet" value="<?= $o->id_outlet; ?>">
            </div>

            <div class="form-group">
              <label>Alamat <?= $judul ?></label>
              <textarea class="form-control" required name="alamat" rows="3"><?= $o->alamat; ?></textarea>
            </div>

            <div class="form-group">
              <label>Nomor Telepon</label>
              <input class="form-control" type="text" required name="tlp" value="<?= $o->tlp; ?>">
            </div>
          </div>

          <!-- footer modal -->
          <div class="modal-footer">

            <!-- tombol simpan data -->
            <button class="btn btn-success" type="submit">Simpan Perubahan</button>

          </div>

        </form>
      </div>
    </div>
  </div>

<?php endforeach; ?>

<!-- menampilkan data outlet sebagai o dalam modal -->
<?php foreach ($outlet as $o) : ?>

  <!-- modal lihat -->
  <div id="lihat<?= $o->id_outlet; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <!-- header modal -->
        <div class="modal-header">
          <h5 class="modal-title"><?= $judul ?> <?= $o->id_outlet; ?></h5>

          <!-- tombol tutup modal -->
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>

        </div>

        <!-- tag form lihat (tidak wajib) -->
        <form>

          <!-- isi data -->
          <div class="modal-body">
            <div class="form-group">
              <label>Nama <?= $judul ?> : </label>
              <p><?= $o->nama; ?></p>
            </div>

            <div class="form-group">
              <label>Alamat</label>
              <p><?= $o->alamat; ?></p>
            </div>

            <div class="form-group">
              <label>Nomor Telepon</label>
              <p><?= $o->tlp; ?></p>
            </div>

          </div>

          <!-- footer modal -->
          <div class="modal-footer">

            <!-- tombol tutup modal -->
            <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>

          </div>

        </form>

      </div>
    </div>
  </div>
<?php endforeach; ?>