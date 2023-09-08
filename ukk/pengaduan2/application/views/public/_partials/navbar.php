    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="<?= site_url('Main/index'); ?>"><span class="iconify" data-icon="icomoon-free:home" style="margin-left: 200px; color: rgb(52, 63, 223);"></span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('Main/pengaduan'); ?>">PENGADUAN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('Main/about'); ?>">ABOUT US</a>
                </li>
            </ul>

            <a class="nav-link" href="<?= site_url('main/pilihan'); ?>" style="padding-right: 0;">Log In</a>
            <a class="nav-link" href="<?php echo $pengaturan->fb; ?>" style="padding-right: 0;"><span class="iconify" data-icon="ps:facebook-alt" style="color: white;" data-width="20" data-height="20"></span></a>
            <a class="nav-link" href="<?php echo $pengaturan->ig; ?>" style="margin-right: 180px;"><span class="iconify" data-icon="bi:instagram" style="color: white;" data-width="20" data-height="20"></span></a>
        </div>
    </nav>
    <div class="bg1 mt-5">
        <!--Title and Search Box-->
        <div class="container-fluid" style="margin-top: 60px;">
            <div class="row">

                <div class="col-1"></div>

                <div class="col-5 bgw" style="padding-left: 60px; padding-top: 25px;">
                    <img src="<?= base_url('assets/frontend/img/' . $pengaturan->logo); ?>" alt="" height="75px">
                </div>

                <div class="col-2 bgw"></div>

                <div class="col-3 bgw">
                    <form class="form-inline" style="padding-top: 25px;">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="border-radius: 20px;">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>

                <div class="col"></div>
            </div>
        </div>