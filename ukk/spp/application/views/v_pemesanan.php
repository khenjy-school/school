<?php foreach ($pengaturan as $p) : ?>
  <img src="img/<?= $p->foto ?>" class="img-fluid rounded">
<?php endforeach; ?>

<form action="<?= site_url('pesanan/tambah') ?>" method="post">

  <h2>Masukkan Datamu</h2>
  <hr>
  <div class="row justify-content-start mt-4">
    <div class="col-md-6">

      <!-- menentukan id_user jika user sudah membuat akun atau belum -->
      <div class="form-group">
        <label>Nama</label>
        <input class="form-control" type="text" required name="pemesan" placeholder="Masukkan nama pemesan" value="<?= $this->session->userdata('nama') ?>">
        <?php if ($this->session->userdata('id_user')) { ?>
          <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>">
        <?php } else { ?>

          <!-- value 0 di id_user untuk pengguna tanpa akun -->
          <input type="hidden" name="id_user" value="0">

        <?php } ?>
      </div>

      <div class="form-group">
        <label>Nomor Telepon</label>
        <input class="form-control" type="text" required name="tlp" placeholder="Masukkan nomor telepon" value="<?= $this->session->userdata('tlp') ?>">
      </div>

      <div class="form-group">
        <label>Jenis Kelamin</label>
        <select class="form-control" required name="tipe">
          <option selected hidden value="">Pilih jenis kelamin...</option>
          <option>Pria</option>
          <option>Wanita</option>
          <option>Memilih untuk tidak menjawab</option>
        </select>
      </div>

      <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" required name="alamat" rows="3" placeholder="Masukkan alamat anda"><?= $this->session->userdata('alamat') ?></textarea>
      </div>

      <div class="form-group">
        <button class="btn btn-success" onclick="return confirm('Apakah Anda Ingin Memesan?')" type="submit">Konfirmasi Pesanan</button>
        <a class="btn btn-danger" type="button" href="<?= site_url('welcome') ?>">Batal</a>
      </div>

    </div>

    <div class="col-md-6">
      <img class="img-fluid rounded" src="img/booked.png">
    </div>
  </div>
</form>