<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body class="login">

  <div class="container">

    <!-- membuat konten berada tepat di tengah2 halaman  -->
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-md-5 login">

        <!-- link kembali -->
        <a class="text-decoration-none" href="<?= site_url('welcome') ?>">Kembali ke beranda</a>

        <h1 class="text-center">Pilih Outlet</h1>

        <!-- form pilih outlet -->
        <!-- digunakan untuk mengakses tabel outlet supaya terbentuk session id_outlet -->
        <?php foreach ($outlet as $o) : ?>
          <div class="row justify-content-md-center">
            <div class="col-auto">
              <div class="form-group">
                <a class="btn btn-outline-success text-info" type="button" data-toggle="modal" data-target="#login<?= $o->id_outlet; ?>">
                  <i class="fas fa-database"></i> <?= $o->nama; ?></a>

              </div>
            </div>

          </div>
        <?php endforeach; ?>

        <?php foreach ($outlet as $o) : ?>
          <div id="login<?= $o->id_outlet; ?>" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Login ke <?= $o->nama; ?></h5>

                  <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                  </button>
                </div>

                <form action="<?= site_url('user/ceklogin') ?>" method="post">
                  <div class="modal-body">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                      </div>
                      <input class="form-control" type="text" name="username" placeholder="Masukkan username">
                      <input type="hidden" name="id_outlet" value="<?= $o->id_outlet ?>">
                    </div>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                      </div>
                      <input class="form-control" type="password" name="password" placeholder="Masukkan password">
                    </div>

                    <!-- pesan untuk pengguna yang login -->
                    <p class="small text-center text-danger"><?= $this->session->flashdata('pesan') ?></p>

                  </div>

                  <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>


        <?php endforeach; ?>

      </div>
    </div>
  </div>

  <script src="jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="fontawesome/js/all.js"></script>
</body>

</html>