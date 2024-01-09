<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body>

  <div class="container">
    <div class="row justify-content-center align-items-center h-100">

      <!-- mengecek apakah ada transaksi yang telah dilakukan -->
      <?php if (isset($tabel10)) { ?>
        <div class="col-md">
          <h1 class="text-center"><?= $title ?><?= $phase ?></h1>
          <p class="text-center">Id Transaksi Anda adalah <?= $tabel10->id_transaksi ?></p>

          <div class="d-flex justify-content-center">
            <a class="btn btn-success text-light" href="<?= site_url('transaksi/receipt/' . $tabel10->id_transaksi) ?>" target="_blank">
              Cetak Bukti Transaksi</i></a>
          </div>

          <p class="text-center">Anda juga bisa mengecek data transaksi anda<br>
            pada daftar transaksi <br>
            untuk mencetak bukti transaksi</p>

          <div class="d-flex justify-content-center">
            <a class="text-decoration-none" href="<?= site_url('welcome') ?>">
              Kembali ke beranda
            </a>

          </div>
        </div>


        <!-- mengecek apakah ada tb_lelang yang telah dilakukan -->
        <!-- Di bawah ini adalah fitur yang ditetapkan sebagai unfinished, yakni fitur untuk mengelola array dari jumlah tb_lelang yang telah dilakukan. -->
        <!-- Dengan fitur ini, tb_masyarakat dapat memesan lebih dari satu tb_level  -->
        <!-- dan mendapatkan tb_lelang yang terpisah masing-masing -->
        <!-- Sebenarnya lebih baik jika menggunakan tabel tb_lelang dan tabel detail tb_lelang -->
        <!-- Namun hal itu hanya akan mempersulit masalah yang sudah ada -->
        <!-- Fitur ini akan diselesaikan ketika sudah ada pemahaman mengenai cara kerja array -->
      <?php } elseif (isset($tabel8)) { ?>
        <!-- 
        $i = 1;
        do { s?> -->

        <div class="col-md">
          <h1 class="text-center">Pesanan Berhasil</h1>
          <p class="text-center">Id Pesanan Anda adalah <?= $tabel8->id_pembayaran ?></p>
          <p class="text-center">Cari data tb_lelang Anda dengan menggunakan <br>
            id tb_lelang dan email anda <br>
            untuk mencetak bukti tb_lelang</p>

          <div class="d-flex justify-content-center">
            <a class="text-decoration-none" href="<?= site_url('welcome') ?>">
              Kembali ke beranda
            </a>

          </div>
        </div>

        <!--  $i++;
        } while ($i <= $jlh) ?> -->


      <?php } else { ?>
        <!-- anda mengakses halaman konfirmasi tapi tidak memiliki tb_lelang apapun -->
        <div class="col-md">
          <h1 class="text-center">Anda tidak melakukan pemesanan atau transaksi apapun</h1>

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