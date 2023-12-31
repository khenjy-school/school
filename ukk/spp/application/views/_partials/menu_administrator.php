<!-- menu navigasi untuk pengguna dgn level administrator -->
<ul class="navbar-nav ml-auto">
  <li class="nav-item">
    <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('welcome/dashboard') ?>">Dashboard</a>
  </li>
  <li class="nav-item">
    <div class="dropdown">
      <a class="nav-link text-decoration-none font-weight-bold" data-toggle="dropdown" href="#">
        Master Data <i class="fas fa-caret-down"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <h6 class="dropdown-header">Pembayaran</h6>
        <a class="dropdown-item" href="<?= site_url('spp') ?>"><?= $tabel6_alias ?></a>
        <a class="dropdown-item" href="<?= site_url('pembayaran') ?>"><?= $tabel8_alias ?></a>

        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">Operasional Sekolah</h6>
        <a class="dropdown-item" href="<?= site_url('siswa') ?>"><?= $tabel4_alias ?></a>
        <a class="dropdown-item" href="<?= site_url('kelas') ?>"><?= $tabel5_alias ?></a>
        <a class="dropdown-item" href="<?= site_url('petugas') ?>"><?= $tabel9_alias ?></a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <div class="dropdown">
      <!-- tombol ini akan memunculkan dropdown tanpa menggunakan button
    https://stackoverflow.com/questions/38576503/how-to-remove-the-arrow-in-dropdown-in-bootstrap-4
    terimakasih pada link di atas -->
      <a type="button" class="nav-link text-decoration-none font-weight-bold" data-toggle="dropdown" href="#">
        <h4><i class="fas fa-user-tie"></i> <i class="fas fa-caret-down"></i></h4>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="<?= site_url('pengaturan') ?>">Pengaturan</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="<?= site_url('petugas/profil') ?>">Profil</a>
        <a class="dropdown-item" href="<?= site_url('petugas/logout') ?>">Logout</a>
      </div>
    </div>
  </li>
</ul>