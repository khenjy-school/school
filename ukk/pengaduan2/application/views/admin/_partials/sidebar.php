<!-- Sidebar -->
<nav class="navbar-fixed-top">
    <ul class="nav flex-column" id="">
        <li class="nav-item border-bottom sidebar">
            <a class="nav-link" href="<?php echo site_url('main/dashboard') ?>">
                <span class="h4">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link dropdown-toggle h5 text-decoration-none" href="#collapsePengaduan" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapsePengaduan">
                Pengaduan
            </a>
            <ul class="collapse" id="collapsePengaduan">
                <li class="nav">
                    <a href="<?php echo site_url('pengaduan/tambah') ?>">TAMBAH</a>
                </li>
                <li class="nav">
                    <a href="<?php echo site_url('pengaduan/index') ?>">LIHAT</a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link dropdown-toggle h5 text-decoration-none" href="#collapseTanggapan" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTanggapan">
                Tanggapan
            </a>
            <ul class="collapse" id="collapseTanggapan">
                <li class="nav">
                    <a href="<?php echo site_url('tanggapan/pilih') ?>">TAMBAH</a>
                </li>
                <li class="nav">
                    <a href="<?php echo site_url('tanggapan/index') ?>">LIHAT</a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link dropdown-toggle h5 text-decoration-none" href="#collapseMasyarakat" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseMasyarakat">
                Masyarakat
            </a>
            <ul class="collapse" id="collapseMasyarakat">
                <li class="nav">
                    <a href="<?php echo site_url('masyarakat/tambah') ?>">TAMBAH</a>
                </li>
                <li class="nav">
                    <a href="<?php echo site_url('masyarakat/index') ?>">LIHAT</a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link dropdown-toggle h5 text-decoration-none" href="#collapsePetugas" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapsePetugas">
                Petugas
            </a>
            <ul class="collapse" id="collapsePetugas">
                <li class="nav">
                    <a href="<?php echo site_url('petugas/tambah') ?>">TAMBAH</a>
                </li>
                <li class="nav">
                    <a href="<?php echo site_url('petugas/index') ?>">LIHAT</a>
                </li>
                <li class="nav">
                    <a href="<?php echo site_url('petugas/profil') ?>">PROFIL</a>
                </li>
                <li class="nav">
                    <a href="<?php echo site_url('petugas/logout') ?>">LOGOUT</a>
                </li>
            </ul>
        </li>
        <li class="nav-item border-bottom sidebar">
            <a class="nav-link" href="<?php echo site_url('main/help') ?>">
                <span class="h4">Bantuan</span>
            </a>
        </li>
        <li class="nav-item sidebar">
            <a class="nav-link" href="<?php echo site_url('main/latihan') ?>">
                <span class="h4">Latihan</span>
            </a>
        </li>
        <li class="nav-item sidebar">
            <a class="nav-link" href="<?php echo site_url('main/latihan2') ?>">
                <span class="h4">Latihan2</span>
            </a>
        </li>
        <li class="nav-item sidebar">
            <a class="nav-link" href="<?php echo site_url('main/latihan3') ?>">
                <span class="h4">Latihan3</span>
            </a>
        </li>
    </ul>
</nav>