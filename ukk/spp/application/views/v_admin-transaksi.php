<!-- halaman masih dalam proses, rencana mau selesaikan yang lain dulu untuk menghindari burnout -->
<?php if ($this->session->userdata('akses') <> 'kasir') {
  redirect(site_url('welcome/no_akses'));
} ?>

<h1>Daftar <?= $judul ?></h1>
<hr>
<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>

<table class="table table-light" id="data">
  <thead class="thead-light">
    <tr>
      <th>Id Transaksi</th>
      <th>Id Member</th>
      <th>Tgl</th>
      <th>Batas Waktu</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($transaksi as $t) : ?>
      <tr>
        <td><?= $t->id_transaksi ?></td>
        <td><?= $t->id_member ?></td>
        <td><?= $t->tgl ?></td>
        <td><?= $t->batas_waktu ?></td>
        <td><?= $t->status ?></td>

        <td>
          <a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $t->id_transaksi; ?>">
            <i class="fas fa-eye"></i></a>
          <!-- tombol yang akan muncul berdasarkan nilai dari status -->
          <?php if ($t->status == 'baru') { ?>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $t->id_transaksi ?>">
              <i class="fas fa-edit"></i></a>
          <?php } elseif ($t->status == 'proses') { ?>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $t->id_transaksi ?>">
              <i class="fas fa-edit"></i></a>
          <?php } elseif ($t->status == 'selesai') { ?>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $t->id_transaksi ?>">
              <i class="fas fa-edit"></i></a>
          <?php } elseif ($t->status == 'diambil') { ?>
            <a class="btn btn-light text-danger" onclick="return confirm('Hapus transaksi?')" href="<?= site_url('transaksi/hapus/' . $t->id_transaksi) ?>">
              <i class="fas fa-trash"></i></a>
          <?php } ?>

          <!-- tombol print, hasil print akan muncul di tab baru 
        https://stackoverflow.com/questions/32778670/codeigniter-load-view-in-new-tab#:~:text=Say%20you%20want%20it%20to,_blank%22%20in%20the%20form%20tag.&text=That%27s%20all.
        terimakasih pada link di atas
        -->
          <a class="btn btn-light text-info" href="<?= site_url('transaksi/print/' . $t->id_transaksi) ?>" target="_blank">
            <i class="fas fa-print"></i></a>

        </td>

      </tr>
    <?php endforeach ?>
  </tbody>

  <tfoot>
    <tr>
      <th>Id Transaksi</th>
      <th>Id Member</th>
      <th>Tgl</th>
      <th>Batas Waktu</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </tfoot>
</table>

<!-- modal tambah -->
<div id="tambah" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah <?= $judul ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <form action="<?= site_url('transaksi/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-row">
            <div class="col-4">
              <label>Kode Invoice</label>

            </div>
            <div class="col-6">
              <input class="form-control form-control-sm" type="text" required name="kode_invoice" placeholder="Masukkan kode invoice">
              <input type="hidden" name="id_outlet" value="<?= $this->session->userdata('id_outlet') ?>">
              <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>">

            </div>
          </div>

          <div class="form-row">
            <div class="col-4">
              <label>Id Member</label>

            </div>
            <div class="col-6">
              <select class="form-control form-control-sm" required name="id_member">
                <option selected hidden value="">Masukkan id...</option>
                <?php foreach ($member as $m) : ?>
                  <option><?= $m->id_member ?></option>
                <?php endforeach ?>
              </select>

            </div>
          </div>

          <div class="form-row">
            <div class="col-4">
              <label>Tanggal</label>

            </div>
            <div class="col-6">
              <input class="form-control form-control-sm" type="datetime-local" required name="tgl">

            </div>
          </div>

          <div class="form-row">
            <div class="col-4">
              <label>Batas Waktu</label>

            </div>
            <div class="col-6">
              <input class="form-control form-control-sm" type="datetime-local" required name="batas_waktu">

            </div>
          </div>

          <div class="form-row">
            <div class="col-4">
              <label>Tanggal Bayar</label>

            </div>
            <div class="col-6">
              <input class="form-control form-control-sm" type="datetime-local" required name="tgl_bayar">

            </div>
          </div>

          <div class="form-row">
            <div class="col-4">
              <label>Biaya Tambahan</label>

            </div>
            <div class="col-6">
              <input class="form-control form-control-sm" type="text" required name="biaya_tambahan">

            </div>
          </div>

          <div class="form-row">
            <div class="col-4">
              <label>Diskon</label>

            </div>
            <div class="col-6">
              <input class="form-control form-control-sm" type="text" required name="diskon">

            </div>
          </div>

          <div class="form-row">
            <div class="col-4">
              <label>Pajak</label>

            </div>
            <div class="col-6">
              <input class="form-control form-control-sm" type="text" required name="pajak">

            </div>
          </div>

          <hr class="mt-3">

          <!-- form menggunakan repeater form, terhubung dengan script di template.php -->
          <!-- https://www.youtube.com/watch?v=gmdEUuTtqZg -->
          <!-- form tambah detail transaksi -->
          <div class="form-group child-repeater-table">
            <table class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th>Id Paket</th>
                  <th>Qty</th>
                  <th>Keterangan</th>
                  <th><a href="javascript:void(0)" class="btn btn-success addRow">+</a></th>
                </tr>
              </thead>
              <tbody id="isi">
                <tr>
                  <td><select name="id_paket[]" class="form-control" required>
                      <option selected hidden value=""></option>
                      <?php foreach ($paket as $p) : ?>
                        <option><?= $p->id_paket ?></option>
                      <?php endforeach ?>
                    </select></td>
                  <td><input type="number" name="qty[]" class="form-control"></td>
                  <td><input type="text" name="keterangan[]" class="form-control"></td>
                  <td><a href="javascript:void(0)" class="btn btn-danger deleteRow">-</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal ubah -->
<?php foreach ($transaksi as $t) : ?>


  <div id="ubah<?= $t->id_transaksi ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $judul ?> <?= $t->id_transaksi ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- form untuk mengubah nilai status sebuah transaksi -->
        <form action="<?= site_url('transaksi/update') ?>" method="post">
          <div class="modal-body">

            <!-- isi form ubah status, diakses oleh admin -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Id <?= $judul ?></label>
                  <p><?= $t->id_transaksi ?></p>
                  <input type="hidden" name="id_transaksi" value="<?= $t->id_transaksi; ?>">
                  <input type="hidden" name="id_outlet" value="<?= $t->id_outlet; ?>">

                  <?php if ($t->status == 'baru') { ?>
                    <input type="hidden" name="status" value="proses">
                  <?php } elseif ($t->status == 'proses') { ?>
                    <input type="hidden" name="status" value="selesai">
                  <?php } elseif ($t->status == 'selesai') { ?>
                    <input type="hidden" name="status" value="diambil">
                  <?php } ?>

                </div>

                <div class="form-group">
                  <label>Id Member</label>
                  <p><?= $t->id_member ?></p>
                </div>

                <div class="form-group">
                  <label>Tanggal</label>
                  <p><?= $t->tgl ?></p>
                </div>

                <div class="form-group">
                  <label>Batas waktu</label>
                  <p><?= $t->tgl ?></p>
                </div>

                <div class="form-group">
                  <label>Status</label>
                  <p><?= $t->status ?></p>
                </div>

                <div class="form-group">
                  <label>Status Bayar</label>
                  <p><?= $t->dibayar ?></p>
                </div>


              </div>

              <div class="col-md-6">
                <h2>Daftar <?= $judul ?></h2>

                <?php foreach ($detail_transaksi as $dt) : ?>
                  <table class="table table-light">
                    <thead class="thead-light">
                      <tr>
                        <th>Id <?= $judul ?></th>
                        <th>Qty</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?= $dt->id_paket ?></td>
                        <td><?= $dt->qty ?></td>
                        <td><?= $dt->keterangan ?></td>
                      </tr>
                    </tbody>
                  </table>

                <?php endforeach ?>

              </div>
            </div>
          </div>

          <div class="modal-footer">

            <!-- pesan yg muncul berdasarkan nilai status -->
            <?php if ($t->status == 'baru') { ?>
              <p>Ubah Status Menjadi Proses?</p>
            <?php } elseif ($t->status == 'proses') { ?>
              <p>Ubah Status Menjadi Selesai?</p>
            <?php } elseif ($t->status == 'selesai') { ?>
              <p>Ubah Status Menjadi Diambil?</p>
            <?php } ?>

            <button class="btn btn-success" type="submit">Ya</button>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach ?>

<!-- modal lihat -->
<?php foreach ($transaksi as $t) : ?>


  <div id="lihat<?= $t->id_transaksi ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $judul ?> <?= $t->id_transaksi ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form>
          <div class="modal-body">

            <!-- isi form ubah status, diakses oleh admin -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Id <?= $judul ?></label>
                  <p><?= $t->id_transaksi ?></p>
                </div>

                <div class="form-group">
                  <label>Id Member</label>
                  <p><?= $t->id_member ?></p>
                </div>

                <div class="form-group">
                  <label>Tanggal</label>
                  <p><?= $t->tgl ?></p>
                </div>

                <div class="form-group">
                  <label>Batas waktu</label>
                  <p><?= $t->tgl ?></p>
                </div>

                <div class="form-group">
                  <label>Status</label>
                  <p><?= $t->status ?></p>
                </div>

                <div class="form-group">
                  <label>Status Bayar</label>
                  <p><?= $t->dibayar ?></p>
                </div>


              </div>

              <div class="col-md-6">
                <h4>Daftar <?= $judul ?></h4>

                <?php foreach ($detail_transaksi as $dt) : ?>
                  <table class="table table-light">
                    <thead class="thead-light">
                      <tr>
                        <th>Id <?= $judul ?></th>
                        <th>Qty</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?= $dt->id_paket ?></td>
                        <td><?= $dt->qty ?></td>
                        <td><?= $dt->keterangan ?></td>
                      </tr>
                    </tbody>
                  </table>

                <?php endforeach ?>

              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach ?>