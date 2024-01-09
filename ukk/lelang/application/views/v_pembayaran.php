<h1><?= $title ?><?= $phase ?></h1>
<hr>


<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= $tabel8_field6_alias ?></th>
        <th><?= $tabel8_field10_alias ?></th>
        <th><?= $tabel8_field11_alias ?></th>
        <th><?= $tabel8_field12_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tabel8 as $tl8) : ?>
        <tr>
          <td><?= $tl8->tb_masyarakat ?></td>
          <td><?= $tl8->cek_in ?></td>
          <td><?= $tl8->cek_out ?></td>
          <td><?= $tl8->status ?></td>
          <td>
            <a class="btn btn-light text-info" data-toggle="modal" data-target="#lihat<?= $tl8->id_pembayaran ?>" href="#">
              <i class="fas fa-eye"></i></a>

            <?php foreach ($tabel5 as $tl5) : ?>
              <?php if ($tl8->id_pembayaran == $tl5->id_pembayaran) { ?>
                <a class="btn btn-light text-info" data-toggle="modal" data-target="#tb_level<?= $tl8->id_pembayaran ?>" href="#">
                  <i class="fas fa-bed"></i></a>
              <?php } ?>
            <?php endforeach ?>

            <?php switch ($tl8->status) {
              case 'belum bayar': ?>
                <a class="btn btn-danger text-light" data-toggle="modal" data-target="#bayar<?= $tl8->id_pembayaran ?>" href="#">
                  <i class="fas fa-shopping-cart"></i></a>
              <?php break;

              case 'menunggu':
              case 'cek in': ?>
                <a class="btn btn-light text-info" href="<?= site_url('tb_lelang/print/' . $tl8->id_pembayaran) ?>" target="_blank">
                  <i class="fas fa-print"></i></a>
              <?php break;

              default: ?>

            <?php } ?>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>

    <tfoot>
      <tr>
        <th><?= $tabel8_field6_alias ?></th>
        <th><?= $tabel8_field10_alias ?></th>
        <th><?= $tabel8_field11_alias ?></th>
        <th><?= $tabel8_field12_alias ?></th>
        <th>Aksi</th>
      </tr>
    </tfoot>
  </table>
</div>

<!-- modal bayar -->
<?php foreach ($tabel8 as $tl8) : ?>

  <div id="bayar<?= $tl8->id_pembayaran ?>" class="modal fade bayar">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Transaksi untuk Pesanan <?= $tl8->id_pembayaran ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('transaksi/tambah') ?>" method="post" enctype="multipart/form-data">

          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label><?= $tabel8_field1_alias ?></label>
                  <p><?= $tl8->id_pembayaran ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel8_field3_alias ?></label>
                  <p><?= $tl8->pemesan ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel8_field4_alias ?></label>
                  <p><?= $tl8->email ?></p>

                  <!-- Email ini digunakan untuk menambahkan sesi temporer untuk konfirmasi transaksi -->
                  <input type="hidden" name="email" value="<?= $tl8->email ?>">
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel8_field5_alias ?></label>
                  <p><?= $tl8->hp ?></p>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label><?= $tabel8_field6_alias ?></label>
                  <p><?= $tl8->tb_masyarakat ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel6_field2_alias ?></label>
                  <?php foreach ($tabel6 as $tl6) :
                    if ($tl6->id_barang === $tl8->id_barang) { ?>
                      <p><?= $tl6->tipe ?></p>
                    <?php } ?>
                  <?php endforeach ?>

                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel8_field10_alias ?></label>
                  <p><?= $tl8->cek_in ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel8_field11_alias ?></label>
                  <p><?= $tl8->cek_out ?></p>
                </div>
              </div>


              <!-- Input metode tb_lelang -->

              <div class="col-md-12">


                <div class="form-group">
                  <label><?= $tabel8_field9_alias ?></label>
                  <p>Rp <?= number_format($tl8->harga_total, '2', ',', '.') ?></p>
                  <input type="hidden" name="id_pembayaran" value="<?= $tl8->id_pembayaran ?>">
                </div>

                <div class="form-group">
                  <label>Metode Lelang</label>
                  <select class="form-control" required name="metode">
                    <option selected hidden value="">Pilih Metode Lelang...</option>
                    <option>debit</option>
                    <option>ewallet</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Jumlah Bayar</label>
                  <input class="form-control" readonly type="number" required name="bayar" placeholder="Masukkan jumlah bayar" value="<?= $tl8->harga_total ?>">
                  <input type="hidden" name="status" value="menunggu">

                </div>
              </div>

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
<?php endforeach ?>

<!-- modal lihat -->
<?php foreach ($tabel8 as $tl8) :
  foreach ($tabel6 as $tl6) :
    if ($tl6->id_barang == $tl8->id_barang) { ?>

      <div id="lihat<?= $tl8->id_pembayaran ?>" class="modal fade lihat">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $tabel8_alias ?> <?= $tl8->id_pembayaran ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel8_field1_alias ?></label>
                    <p><?= $tl8->id_pembayaran ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field3_alias ?></label>
                    <p><?= $tl8->pemesan ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field4_alias ?></label>
                    <p><?= $tl8->email ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field5_alias ?></label>
                    <p><?= $tl8->hp ?></p>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel8_field6_alias ?></label>
                    <p><?= $tl8->tb_masyarakat ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel6_field2_alias ?></label>
                    <p><?= $tl6->tipe ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field10_alias ?></label>
                    <p><?= $tl8->cek_in ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field11_alias ?></label>
                    <p><?= $tl8->cek_out ?></p>
                  </div>
                </div>
              </div>
            </div>

            <!-- memunculkan notifikasi modal -->
            <p id="p_lihat" class="small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

            <div class="modal-footer">
              <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
<?php }
  endforeach;
endforeach ?>


<!-- modal lihat tb_level -->
<!-- Aku ingin merubah modal ini menjadi modal yang memberikan informasi khusus mengenai tb_level yang sudah dipesan -->
<!-- Aku mau yang ada di sini isinya bagus dan interaktif -->
<?php foreach ($tabel8 as $tl8) :
  foreach ($tabel6 as $tl6) :
    if ($tl6->id_barang == $tl8->id_barang) { ?>

      <div id="tb_level<?= $tl8->id_pembayaran ?>" class="modal fade lihat">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $tabel8_alias ?> <?= $tl8->id_pembayaran ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel8_field1_alias ?></label>
                    <p><?= $tl8->id_pembayaran ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field3_alias ?></label>
                    <p><?= $tl8->pemesan ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field4_alias ?></label>
                    <p><?= $tl8->email ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field5_alias ?></label>
                    <p><?= $tl8->hp ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field6_alias ?></label>
                    <p><?= $tl8->tb_masyarakat ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel6_field2_alias ?></label>
                    <p><?= $tl6->tipe ?></p>
                  </div>
                </div>

                <div class="col-md-6">
                  <?php foreach ($tabel5 as $tl5) : ?>
                    <?php if ($tl8->id_pembayaran == $tl5->id_pembayaran) { ?>

                      <div class="form-group">
                        <label><?= $tabel5_field1_alias ?></label>
                        <p><?= $tl5->id_kelas ?></p>
                      </div>
                      <hr>

                  <?php }
                  endforeach ?>

                  <div class="form-group">
                    <label><?= $tabel8_field10_alias ?></label>
                    <p><?= $tl8->cek_in ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel8_field11_alias ?></label>
                    <p><?= $tl8->cek_out ?></p>
                  </div>
                </div>
              </div>
            </div>

            <!-- memunculkan notifikasi modal -->
            <p id="p_lihat" class="small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

            <div class="modal-footer">
              <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
<?php }
  endforeach;
endforeach ?>