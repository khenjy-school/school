<?php switch ($this->session->userdata('level')) {
  case 'administrator':
  case 'tb_petugas':
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<!-- tabel fiter history_lelang -->
<table class="mb-8">

  <!-- method get supaya nilai dari filter bisa tampil nanti -->
  <!-- Mengecek data menggunakan tanggal cek in -->
  <form action="<?= site_url('tb_lelang') ?>" method="get">
    <tr>

      <td class="pr-2"><?= $tabel8_field3_alias ?></td>
      <td class="pr-2">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Masukkan</span>
          </div>
          <input type="text" class="form-control" name="id_user" value="<?= $id_user ?>">
        </div>
      </td>
      <td>
        <button class="btn btn-success" type="submit">
          <a type="submit"><i class="fas fa-search"></i></a>
        </button>
        <a class="btn btn-danger" type="button" href="<?= site_url('tb_lelang') ?>">
          <i class="fas fa-redo"></i></a>
      </td>

    </tr>

    <!-- Mengecek data menggunakan tanggal cek out -->
    <!-- method get supaya nilai dari filter bisa tampil nanti -->
  </form>
</table>

<?php foreach ($tabel4 as $tl4) :
  if ($tl4->id_user == '') { ?> <?php } else { ?>

    <h1>Biodata Siswa<?= $phase ?></h1>
    <hr>

    <div class="table-responsive">
      <table class="table table-light" id="data">
        <thead></thead>
        <tbody>
          <?php foreach ($tabel4 as $tl4) : ?>
            <tr>
              <td class="table-secondary table-active"><?= $tabel4_field1_alias ?></td>
              <td class="table-light"><?= $tl4->id_user ?></td>
            </tr>

            <tr>
              <td class="table-secondary table-active"><?= $tabel4_field2_alias ?></td>
              <td class="table-light"><?= $tl4->nis ?></td>
            </tr>

            <tr>
              <td class="table-secondary table-active"><?= $tabel4_field3_alias ?></td>
              <td class="table-light"><?= $tl4->nama ?></td>
            </tr>

            <tr>
              <td class="table-secondary table-active"><?= $tabel4_field4_alias ?></td>
              <td class="table-light"><?= $tl4->id_kelas ?></td>
            </tr>

            <tr>
              <td class="table-secondary table-active"><?= $tabel4_field5_alias ?></td>
              <td class="table-light"><?= $tl4->alamat ?></td>
            </tr>

            <tr>
              <td class="table-secondary table-active"><?= $tabel4_field6_alias ?></td>
              <td class="table-light"><?= $tl4->no_telp ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
        <tfoot></tfoot>
      </table>
    </div>

    <br><br>
    <h1>Lelang SPP<?= $phase ?></h1>
    <hr>

    <div class="table-responsive">
      <table class="table table-light" id="data">
        <thead class="thead-light">
          <tr class="table-info text-center">
            <td colspan="9">
              <a class="btn btn-light text-success" type="button" data-toggle="modal" data-target="#entri">
                + Tambah Entri</a>
            </td>
          </tr>
          <tr>
            <th><?= $tabel8_field1_alias ?></th>
            <th><?= $tabel8_field2_alias ?></th>
            <th><?= $tabel8_field3_alias ?></th>
            <th><?= $tabel8_field4_alias ?></th>
            <th><?= $tabel8_field5_alias ?></th>
            <th><?= $tabel8_field6_alias ?></th>
            <th><?= $tabel8_field7_alias ?></th>
            <th><?= $tabel8_field8_alias ?></th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>

          <?php foreach ($tabel8 as $tl8) : ?>
            <tr>
              <td><?= $tl8->id_pembayaran ?></td>
              <td><?= $tl8->id_petugas ?></td>
              <td><?= $tl8->id_user ?></td>
              <td><?= $tl8->tgl_bayar ?></td>
              <td><?= $tl8->bulan_dibayar ?></td>
              <td><?= $tl8->tahun_dibayar ?></td>
              <td><?= $tl8->id_barang ?></td>
              <td>Rp <?= number_format($tl8->jumlah_bayar, '2', ',', '.') ?></td>

              <td>

                <!-- tombol yang akan muncul berdasarkan nilai dari status -->
                <!-- switch ($tl8->status) {
              case 'pending': ?>
                <a class="btn btn-light text-success" type="button" data-toggle="modal" data-target="#book<?= $tl8->id_pembayaran ?>">
                  <i class="fas fa-bell-concierge"></i></a>
               break;

              case 'menungggu': ?>
                <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tl8->id_pembayaran ?>">
                  <i class="fas fa-edit"></i></a>
               break;

              case 'cek in': ?>
                <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tl8->id_pembayaran ?>">
                  <i class="fas fa-edit"></i></a>
               break;

              case 'cek out': ?>
                <a class="btn btn-light text-danger" onclick="return confirm('Hapus tb_lelang?')" href="<?= site_url('tb_lelang/hapus/' . $tl8->id_pembayaran) ?>">
                  <i class="fas fa-trash"></i></a>
               break;

              default: ?>
             } ?> -->

                <!-- tombol print, hasil print akan muncul di tab baru 
        https://stackoverflow.com/questions/32778670/codeigniter-load-view-in-new-tab#:~:text=Say%20you%20want%20it%20to,_blank%22%20in%20the%20form%20tag.&text=That%27s%20all.
        terimakasih pada link di atas
        -->
                <a class="btn btn-light text-info" href="<?= site_url('tb_lelang/print/' . $tl8->id_pembayaran) ?>" target="_blank">
                  <i class="fas fa-print"></i></a>

              </td>

            </tr>
          <?php endforeach ?>
        </tbody>

        <tfoot>
          <tr>
            <th><?= $tabel8_field1_alias ?></th>
            <th><?= $tabel8_field2_alias ?></th>
            <th><?= $tabel8_field3_alias ?></th>
            <th><?= $tabel8_field4_alias ?></th>
            <th><?= $tabel8_field5_alias ?></th>
            <th><?= $tabel8_field6_alias ?></th>
            <th><?= $tabel8_field7_alias ?></th>
            <th><?= $tabel8_field8_alias ?></th>
            <th>Aksi</th>
          </tr>
        </tfoot>
      </table>
    </div>
  <?php } ?>
<?php endforeach; ?>

<div id="entri" class="modal fade bayar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Entri</h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url('tb_lelang/tambah') ?>" method="post" enctype="multipart/form-data">

        <div class="modal-body">
          <div class="row">

            <!-- Data tb_masyarakat -->
            <?php foreach ($tabel4 as $tl4) : ?>
              <?php foreach ($tabel6 as $tl6) : ?>
                <?php if ($tl4->id_barang == $tl6->id_barang) { ?>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?= $tabel4_field1_alias ?></label>
                      <p><?= $tl4->id_user ?></p>
                      <input type="hidden" name="id_user" value="<?= $tl4->id_user ?>">
                      <input type="hidden" name="id_petugas" value="<?= $this->session->userdata('id_petugas') ?>">
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel4_field2_alias ?></label>
                      <p><?= $tl4->nis ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel4_field3_alias ?></label>
                      <p><?= $tl4->nama ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel4_field4_alias ?></label>
                      <p><?= $tl4->id_kelas ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel4_field5_alias ?></label>
                      <p><?= $tl4->alamat ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel4_field6_alias ?></label>
                      <p><?= $tl4->no_telp ?></p>
                    </div>
                    <hr>
                  </div>


                  <!-- Data SPP -->

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?= $tabel6_field2_alias ?></label>
                      <p><?= $tl6->tahun ?></p>
                      <input type="hidden" name="id_barang" value="<?= $tl6->id_barang ?>">
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel6_field3_alias ?></label>
                      <p>Rp <?= number_format($tl6->nominal, '2', ',', '.') ?></p>
                    </div>
                    <hr>



                    <!-- Di bawah ini adalah form input tb_lelang -->
                    <div class="form-group">
                      <label><?= $tabel8_field4_alias ?> </label>
                      <input class="form-control" type="date" required name="tgl_bayar" min="<?= date('Y-m-d'); ?>">
                    </div>

                    <div class="form-group">
                      <label><?= $tabel8_field5_alias ?> </label>
                      <select class="form-control" required name="bulan_dibayar">
                        <option value="" selected hidden>Pilih <?= $tabel8_field5_alias ?></option>
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label><?= $tabel8_field6_alias ?> </label>
                      <input class="form-control" type="number" required name="tahun_dibayar" value="<?= $tl6->tahun ?>" placeholder="Masukkan <?= $tabel8_field6_alias ?>">
                    </div>

                    <div class="form-group">
                      <label><?= $tabel8_field8_alias ?> </label>
                      <input class="form-control" readonly type="number" required name="jumlah_bayar" placeholder="Masukkan <?= $tabel8_field8_alias ?>" value="<?= $tl6->nominal ?>">
                    </div>
                  </div>

                <?php } ?>
              <?php endforeach; ?>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- pesan untuk pengguna yang sedang merubah password -->
        <p id="p_bayar" class="small text-center text-danger"><?= $this->session->flashdata('pesan_bayar') ?></p>

        <div class="modal-footer">
          <button class="btn btn-success" type="submit">Bayar</button>
        </div>
      </form>

    </div>
  </div>
</div>