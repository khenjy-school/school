<!-- menu navigasi untuk pengguna dgn level tb_masyarakat -->
<ul id="tour2" class="navbar-nav ml-auto">
  <li class="nav-item">
    <!-- tombol untuk memunculkan modal cari -->
    <a class="nav-link text-decoration-none font-weight-bold" data-toggle="modal" data-target="#cari" href="#"><i class="nav-link fas fa-search"></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('welcome') ?>">Home</a>
  </li>

  <li class="nav-item">
    <div class="dropdown">
      <a type="button" id="tour2" class="nav-link dropdown-tgl text-decoration-none font-weight-bold" data-toggle="dropdown">
        <h4><?= $this->session->userdata('nama') ?> <i class="fas fa-caret-down"></i></h4>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <h6 class="dropdown-header">Lelang</h6>
        <a class="dropdown-item" href="<?= site_url('tb_lelang/daftar') ?>">Daftar Lelang/div></a>

        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">History</h6>
        <a class="dropdown-item" href="<?= site_url('history_lelang/daftar') ?>">History Lelang</a>

        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="<?= site_url('tb_masyarakat/profil') ?>">Profil</a>
        <!-- <a id="introBaru" type="button" class="dropdown-item">Quick Tour</a> -->
        <a class="dropdown-item" href="<?= site_url('tb_masyarakat/logout') ?>">Logout</a>
      </div>
    </div>
  </li>

</ul>