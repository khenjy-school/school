<!-- mengarahkan ke no_akses jika user tidak memiliki akses -->
<?php if (!$this->session->userdata('akses')) {
  redirect(site_url('welcome/no_akses'));
} ?>

<h1>Dashboard</h1>
<hr>
<div class="row">

  <!-- menampilkan data untuk admin -->
  <?php if ($this->session->userdata('akses') == 'admin') { ?>
    <div class="col-lg-3 mt-2">
      <div class="card text-white bg-success">
        <div class="card-body">
          <h5 class="card-title"><?= $tabel1 ?></h5>
          <p class="card-text" style="font-size: 32;"><?= $member ?></p>
          <a class="text-white" href="<?= site_url('member') ?>">Lihat Detail >></a>
        </div>
      </div>
    </div>
    
    <div class="col-lg-3 mt-2">
      <div class="card text-white bg-secondary">
        <div class="card-body">
          <h5 class="card-title"><?= $tabel2 ?></h5>
          <p class="card-text" style="font-size: 32;"><?= $outlet ?></p>
          <a class="text-white" href="<?= site_url('outlet') ?>">Lihat Detail >></a>
        </div>
      </div>
    </div>
    
    <div class="col-lg-3 mt-2">
      <div class="card text-white bg-primary">
        <div class="card-body">
          <h5 class="card-title"><?= $tabel3 ?></h5>
          <p class="card-text" style="font-size: 32;"><?= $paket ?></p>
          <a class="text-white" href="<?= site_url('paket') ?>">Lihat Detail >></a>
        </div>
      </div>
    </div>
    
    <div class="col-lg-3 mt-2">
      <div class="card text-white bg-danger">
        <div class="card-body">
          <h5 class="card-title"><?= $tabel4 ?></h5>
          <p class="card-text" style="font-size: 32;"><?= $user ?></p>
          <a class="text-white" href="<?= site_url('user') ?>">Lihat Detail >></a>
        </div>
      </div>
    </div>

    <!-- menampilkan data untuk kasir -->
  <?php } elseif (($this->session->userdata('akses') == 'kasir')) { ?>
    <div class="col-lg-2 mt-2">
      <div class="card text-white bg-primary">
        <div class="card-body">
          <h5 class="card-title"><?= $tabel5 ?></h5>
          <p class="card-text" style="font-size: 32;"><?= $transaksi ?></p>
          <a class="text-white" href="<?= site_url('transaksi') ?>">Lihat Detail >></a>
        </div>
      </div>
    </div>

  <?php } ?>

</div>

<h2 class="mt-4">Detail Website</h2>
<hr>
<?php foreach ($pengaturan as $p) : ?>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>Nama : </label>
        <p><?= $p->nama; ?></p>
      </div>

      <div class="form-group">
        <label>Alamat : </label>
        <p><?= $p->alamat; ?></p>
      </div>

      <div class="form-group">
        <label>Email : </label>
        <p><?= $p->email; ?></p>
      </div>

      <div class="form-group">
        <label>Nomor Telepon : </label>
        <p><?= $p->hp; ?></p>
      </div>

      <div class="form-group">
        <a class="text-decoration-none text-primary" href="<?= $p->fb; ?>" target="_blank">Akun Facebook</a>
      </div>

      <div class="form-group">
        <a class="text-decoration-none text-danger" href="<?= $p->ig; ?>" target="_blank">Akun Instagram</a>
      </div>
    </div>

    <div class="col-md-6">
      <img class="img-thumbnail rounded" src="img/<?= $p->foto ?>">
    </div>
  </div>
<?php endforeach; ?>