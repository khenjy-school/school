<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body>

  <div class="container">
    <div class="row justify-content-center align-items-center h-100">

      <!-- menampilkan data transaksi sebagai ps -->
      <?php if (isset($transaksi)) { ?>
        <div class="col-md">
          <h1 class="text-center">Pesanan Berhasil</h1>
          <p class="text-center">Id Pesanan Anda adalah <?= $transaksi->id_transaksi ?></p>
          <p class="text-center">Kembali ke beranda untuk<br>
            mengkonfirmasi transaksi Anda</p>

          <div class="d-flex justify-content-center">
            <a class="text-decoration-none" href="<?= site_url('welcome') ?>">
              Kembali ke beranda
            </a>

          </div>
        </div>

      <?php } else { ?>
        <!-- anda mengakses halaman konfirmasi tapi tidak memiliki transaksi apapun -->
        <div class="col-md">
          <h1 class="text-center">Anda tidak melakukan pemesanan apapun</h1>

          <div class="d-flex justify-content-center">
            <a class="text-decoration-none" href="<?= site_url('welcome') ?>">
              Kembali ke beranda
            </a>

          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <script src="fontawesome/js/all.js"></script>

</body>

</html>