<!doctype html>
<html lang="en">

<head>
    <base href="<?php echo base_url(); ?>">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url('assets/frontend/img/' . $pengaturan->favicon) ?>" type="image/gif" sizes="16x16">

    <!-- Bootstrap CSS Online -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/lineawesome/css/line-awesome.min.css">
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="assets/custom/css/style.css">
    <link rel="stylesheet" href="assets/googlefont/font.css">
    <title>
        <?php echo $title; ?> - <?php echo $pengaturan->judul; ?>
    </title>
</head>

<body>

    <div class="topbar transition">
        <div class="bars">
            <button type="button" class="btn transition" id="sidebar-toggle">
                <i class="las la-bars"></i>
            </button>
        </div>
        <!-- Navbar -->
        <div class="menu">
            <ul>
                <li>
                    <a href="notifications.html" class="transition">
                        <i class="las la-bell"></i>
                        <span class="badge badge-danger notif">5</span>
                    </a>
                </li>
                <li>
                    <a href="settings.html" class="transition">
                        <i class="las la-sliders-h"></i>
                    </a>
                </li>
                <li>
                    <div class="dropdown">
                        <div class="dropdown-toggle" id="dropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            HI, Admin
                        </div>
                        <div class="dropdown-menu" aria-labelledby="dropdownProfile">
                            <a class="dropdown-item" href="profile.html">My Profile</a>
                            <a class="dropdown-item" href="change-password.html">Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="signout.html">Sign Out</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>


    <div class="sidebar transition">
        <div class="logo">
            <a href="#">
                <p style="font-size: 24px; font-weight: bold; margin-bottom: 0;">This is Logo</p>
            </a>
        </div>

        <!-- Sidebar Menu -->
        <div class="sidebar-items">
            <ul>
                <p class="menu">Navigation</p>
                <li>
                    <a href="dashboard.html" class="transition active">
                        <i class="las la-home"></i>
                        <span>Dashoard</span>
                    </a>
                </li>
                <li>
                    <a href="page-layout.html" class="transition">
                        <i class="lab la-chromecast"></i>
                        <span>Page Layout</span>
                    </a>
                </li>
                <p class="menu">UI Element</p>
                <li>
                    <a href="basic.html" class="transition">
                        <i class="las la-box"></i>
                        <span>Basic</span>
                    </a>
                </li>
                <p class="menu">Forms & Table</p>
                <li>
                    <a href="forms.html" class="transition">
                        <i class="las la-file-alt"></i>
                        <span>Forms</span>
                    </a>
                </li>
                <li>
                    <a href="bootstrap-table.html" class="transition">
                        <i class="las la-table"></i>
                        <span>Bootstrap table</span>
                    </a>
                </li>
                <p class="menu">Chart & Maps</p>
                <li>
                    <a href="chart.html" class="transition">
                        <i class="las la-chart-line"></i>
                        <span>Chart</span>
                    </a>
                </li>
                <li>
                    <a href="maps.html" class="transition">
                        <i class="las la-map"></i>
                        <span>Maps</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="sidebar-overlay"></div>

    <div class="container-fluid">
        <!-- Sidebar Menu -->
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
                <li class="nav-item border-bottom sidebar">
                    <a class="nav-link" href="<?php echo site_url('main/latihan') ?>">
                        <span class="h4">Latihan</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Content -->
        <main role="main" class="col-md px-md-4">
            <div class="row">
                <div class="col-md pt-md-5 mb-md-3 border-bottom">
                    <div class="row">
                        <div class="col-md-auto my-auto">
                            <span class="h1"><?php echo $header1; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-auto">
                    <?php $this->load->view('admin/_partials/masyarakat/data') ?>
                </div>
                <div class="col-md-auto">
                    <?php $this->load->view('admin/_partials/petugas/data') ?>
                </div>
                <div class="col-md-auto">
                    <?php $this->load->view('admin/_partials/pengaduan/data') ?>
                </div>
                <div class="col-md-auto">
                    <?php $this->load->view('admin/_partials/tanggapan/data') ?>
                </div>
            </div>
            <div class="row">
                <div class="col pt-md-5 mb-md-3 border-bottom">
                    <span class="h2"><?php echo $header2; ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col border-bottom">
                    <?php $this->load->view('admin/_partials/pengaturan/editform'); ?>
                </div>
            </div>
            <?php $this->load->view('admin/_partials/footer'); ?>
        </main>
    </div>

    <div class="footer transition">
        <p>&copy; 2021 All Right Reserved by <a href="AhliKode.com">AhliKode</a></p>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>