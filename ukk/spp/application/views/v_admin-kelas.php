<?php if ($this->session->userdata('level') <> 'resepsionis') {
  redirect(site_url('welcome/no_level'));
} ?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<a class="btn btn-info mb-4" href="<?= site_url('kelas/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= $tabel5_field1_alias ?></th>
        <th><?= $tabel6_field2_alias ?></th>
        <th><?= $tabel5_field4_alias ?></th>
        <th><?= $tabel5_field5_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tabel5 as $tl5) : ?>
        <?php foreach ($tabel6 as $tl6) : ?>
          <?php if ($tl6->id_spp == $tl5->id_spp) { ?>
            <tr>
              <td><?= $tl5->id_kelas; ?></td>
              <td><?= $tl6->tipe ?></td>
              <td><?= $tl5->status ?></td>
              <td><?= $tl5->keterangan ?></td>
              <td>
                <a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tl5->id_kelas; ?>">
                  <i class="fas fa-eye"></i></a>
                <?php if ($tl5->status == 'Available') { ?>
                  <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tl5->id_kelas; ?>">
                    <i class="fas fa-edit"></i></a>
                <?php } elseif ($tl5->status == 'Unavailable') { ?>
                  <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tl5->id_kelas; ?>">
                    <i class="fas fa-edit"></i></a>
                <?php } elseif ($tl5->status == 'Dirty') { ?>
                  <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#clean<?= $tl5->id_kelas; ?>">
                    <i class="fas fa-broom"></i></a>
                <?php } elseif ($tl5->status == 'Damaged') { ?>
                  <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#maintenance<?= $tl5->id_kelas; ?>">
                    <i class="fas fa-hammer"></i></a>

                <?php } ?>

                <!-- Saat ini tidak masuk akal untuk menambahkan fitur untuk menghapus kelas -->
                <!-- <a class="btn btn-light text-danger" onclick="return confirm('Hapus data fasilitas?')" href="<?= site_url('kelas/hapus/' . $tl5->id_kelas) ?>">
            <i class="fas fa-trash"></i></a> -->
              </td>
            </tr>
          <?php } ?>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </tbody>

    <tfoot>
      <tr>
        <th><?= $tabel5_field1_alias ?></th>
        <th><?= $tabel5_field2_alias ?></th>
        <th><?= $tabel5_field4_alias ?></th>
        <th><?= $tabel5_field5_alias ?></th>
        <th>Aksi</th>
      </tr>
    </tfoot>
  </table>
</div>



<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah <?= $tabel5_alias ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url('kelas/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <!-- memilih salah satu tipe kelas yang ada -->
          <div class="form-group">
            <label><?= $tabel6_field2_alias ?></label>
            <select class="form-control" required name="id_spp">
              <option selected hidden value="">Pilih Tipe Kamar...</option>
              <?php foreach ($tabel6 as $tl6) : ?>

                <!-- mengambil nilai tipe dari tipe kelas -->
                <option value="<?= $tl6->id_spp ?>"><?= $tl6->tipe; ?></option>

              <?php endforeach ?>

            </select>
          </div>

          <div class="form-group">
            <label><?= $tabel5_field4_alias ?></label>
            <select class="form-control" required name="status">
              <option selected hidden value="">Pilih <?= $tabel5_field4_alias ?>...</option>

              <!-- memilih nilai status -->
              <option value="Available">Available</option>
              <option value="Dirty">Dirty</option>
              <option value="Damaged">Damaged</option>

            </select>
          </div>

          <div class="form-group">
            <label><?= $tabel5_field5_alias ?></label>
            <textarea class="form-control" name="keterangan" placeholder="Masukkan keterangan"></textarea>
          </div>

        </div>

        <!-- memunculkan notifikasi modal -->
        <p id="p_tambah" class="small text-center text-danger"><?= $this->session->flashdata('pesan_tambah') ?></p>

        <div class="modal-footer">
          <button class="btn btn-success" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal edit -->
<?php foreach ($tabel5 as $tl5) : ?>
  <?php foreach ($tabel6 as $tl6) : ?>
    <?php if ($tl6->id_spp == $tl5->id_spp) { ?>
      <div id="ubah<?= $tl5->id_kelas; ?>" class="modal fade ubah">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit <?= $tabel5_alias ?> <?= $tl5->id_kelas; ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <form action="<?= site_url('kelas/update') ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">

                  <!-- memilih salah satu tipe kelas yang ada -->
                  <label><?= $tabel6_field2_alias ?></label>
                  <input class="form-control" type="text" readonly name="tipe" value="<?= $tl6->tipe ?>">
                  <input type="hidden" name="id_spp" value="<?= $tl6->id_spp ?>">


                  <!-- Fitur di bawah ini masuk harus dibahas kembali
                  Apakah bisa mengubah id_spp tipe kelas atau tidak
                  Mengingat pengalaman kerja di PT LSI dulu
                  Jika mengubah parent table, maka child tabel tidak akan terlalu berpengaruh  -->
                  <!-- <select class="form-control" required name="id_spp">

                     menampilkan nilai tipe kelas yang aktif
                    <option selected hidden value="< $tl6->id_spp ?>">< $tl6->tipe; ?></option>

                    < foreach ($tabel6 as $tl6) : ?>
                      <option value value="<$tl6->id_spp ?>">< $tl6->tipe; ?></option>
                    < endforeach ?>
                  </select> -->

                </div>

                <div class="form-group">
                  <label><?= $tabel5_field4_alias ?></label>
                  <select class="form-control" required name="status">
                    <option selected hidden value="<?= $tl5->status; ?>"><?= $tl5->status; ?></option>

                    <!-- memilih nilai status -->
                    <option value="Dirty">Dirty</option>
                    <option value="Damaged">Damaged</option>

                  </select>
                  <input type="hidden" name="id_kelas" value="<?= $tl5->id_kelas; ?>">
                </div>

                <div class="form-group">
                  <label><?= $tabel5_field5_alias ?></label>
                  <textarea class="form-control" name="keterangan" rows="3"><?= $tl5->keterangan; ?></textarea>
                </div>

              </div>

              <!-- memunculkan notifikasi modal -->
              <p id="p_ubah" class="small text-center text-danger"><?= $this->session->flashdata('pesan_ubah') ?></p>

              <div class="modal-footer">
                <button class="btn btn-success" type="submit">Simpan Perubahan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  <?php endforeach; ?>
<?php endforeach; ?>

<!-- Modal Lihat -->
<?php foreach ($tabel5 as $tl5) : ?>
  <?php foreach ($tabel6 as $tl6) : ?>
    <?php if ($tl6->id_spp == $tl5->id_spp) { ?>

      <div id="lihat<?= $tl5->id_kelas; ?>" class="modal fade lihat" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $tabel5_alias ?> <?= $tl5->id_kelas; ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <form>
              <div class="modal-body">
                <div class="form-group">
                  <label><?= $tabel6_field2_alias ?> : </label>
                  <p><?= $tl6->tipe; ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel5_field4_alias ?> : </label>
                  <p><?= $tl5->status; ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel5_field5_alias ?> : </label>
                  <p><?= $tl5->keterangan; ?></p>
                </div>

              </div>

              <!-- memunculkan notifikasi modal -->
              <p id="p_lihat" class="small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

              <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  <?php endforeach; ?>
<?php endforeach; ?>


<!-- modal clean -->
<?php foreach ($tabel5 as $tl5) : ?>
  <?php foreach ($tabel6 as $tl6) : ?>
    <?php if ($tl6->id_spp == $tl5->id_spp) { ?>
      <div id="clean<?= $tl5->id_kelas ?>" class="modal fade clean">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Assign Petugas untuk Kamar <?= $tl5->id_kelas ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <!-- form untuk mengubah nilai status sebuah kelas -->
            <form action="<?= site_url('operations/tambah') ?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?= $tabel5_field1_alias ?></label>
                      <p><?= $tl5->id_kelas ?></p>
                      <input type="hidden" name="id_kelas" value="<?= $tl5->id_kelas; ?>">
                      <input type="hidden" name="id_petugas" value="<?= $this->session->userdata('id_petugas') ?>">
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel6_field2_alias ?> : </label>
                      <p><?= $tl6->tipe; ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel5_field4_alias ?> : </label>
                      <p><?= $tl5->status; ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <img src="img/spp/<?= $tl6->img; ?>" width="200">
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel5_field5_alias ?> : </label>
                      <p><?= $tl5->keterangan; ?></p>
                    </div>

                    <!-- mengubah status kelas secara instan berdasarkan id_pembayaran -->
                    <!-- jika id pembayaran itu kosong, berarti belum ada yang pesan dan kelas menjadi Available
                jika sebaliknya, maka kelas akan menjadi Unavailable -->
                    <?php if ($tl5->id_pembayaran <> 0) { ?>
                      <input type="hidden" name="status" value="Unavailable">
                    <?php } else { ?>
                      <input type="hidden" name="status" value="Available">
                    <?php } ?>
                  </div>

                  <div class="col-md-6">
                    <!-- ini adalah fitur untuk assign petugas -->
                    <div class="form-group">
                      <label><?= $tabel4_field2_alias ?></label>
                      <select class="form-control" required name="id_petugas">

                        <!-- menampilkan petugas buat assign -->
                        <option selected hidden>Pilih <?= $tabel4_alias ?>...</option>
                        <?php
                        foreach ($tabel4 as $tl4) :
                          if ($tl4->role == 'cleaning') { ?>
                            <option value="<?= $tl4->id_petugas; ?>"><?= $tl4->nama; ?> - <?= $tl4->role; ?></option>
                        <?php }
                        endforeach ?>
                      </select>
                    </div>

                    <!-- Aku masih ada rencana untuk mengubah textbox keterangan ini dengan dropbox 
                  karena menurutku textarea masih kurang cukup
                dan aku juga membutuhkan bantuan ahli UI UX untuk menentukan keputusan terbaik -->
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea class="form-control" required name="keterangan" rows="3" placeholder="Masukkan keterangan"></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <!-- memunculkan notifikasi modal -->
              <p id="p_clean" class="small text-center text-danger"><?= $this->session->flashdata('pesan_clean') ?></p>

              <div class="modal-footer">
                <p>Proses <?= $tabel5_alias ?> <?= $tl5->id_kelas; ?>?</p>
                <button class="btn btn-success" type="submit">Ya</button>

              </div>
            </form>

          </div>
        </div>
      </div>
    <?php } ?>
  <?php endforeach ?>
<?php endforeach ?>



<!-- modal maintenance -->
<?php foreach ($tabel5 as $tl5) : ?>
  <?php foreach ($tabel6 as $tl6) : ?>
    <?php if ($tl6->id_spp == $tl5->id_spp) { ?>
      <div id="maintenance<?= $tl5->id_kelas ?>" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Assign Petugas untuk Kamar <?= $tl5->id_kelas ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <!-- form untuk mengubah nilai status sebuah kelas -->
            <form action="<?= site_url('operations/tambah') ?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?= $tabel5_field1_alias ?></label>
                      <p><?= $tl5->id_kelas ?></p>
                      <input type="hidden" name="id_kelas" value="<?= $tl5->id_kelas; ?>">
                      <input type="hidden" name="id_petugas" value="<?= $this->session->userdata('id_petugas') ?>">
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel6_field2_alias ?> : </label>
                      <p><?= $tl6->tipe; ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel5_field4_alias ?> : </label>
                      <p><?= $tl5->status; ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <img src="img/spp/<?= $tl6->img; ?>" width="200">
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel5_field5_alias ?> : </label>
                      <p><?= $tl5->keterangan; ?></p>
                    </div>
                    <!-- mengubah status kelas secara instan berdasarkan id_pembayaran -->
                    <!-- jika id pembayaran itu kosong, berarti belum ada yang pesan dan kelas menjadi Available
                jika sebaliknya, maka kelas akan menjadi Unavailable -->
                    <?php if ($tl5->id_pembayaran <> 0) { ?>
                      <input type="hidden" name="status" value="Unavailable">
                    <?php } else { ?>
                      <input type="hidden" name="status" value="Available">
                    <?php } ?>



                  </div>

                  <div class="col-md-6">
                    <!-- ini adalah fitur untuk assign petugas -->
                    <div class="form-group">
                      <label>Petugas</label>
                      <select class="form-control" required name="id_petugas">

                        <!-- menampilkan petugas buat assign -->
                        <option selected hidden>Pilih petugas...</option>
                        <?php
                        foreach ($tabel4 as $tl4) :
                          if ($tl4->role == 'maintenance') { ?>
                            <option value="<?= $tl4->id_petugas; ?>"><?= $tl4->nama; ?> - <?= $tl4->role; ?></option>
                        <?php }
                        endforeach ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea class="form-control" required name="keterangan" rows="3" placeholder="Masukkan keterangan"></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <!-- memunculkan notifikasi modal -->
              <p id="p_maintenance" class="small text-center text-danger"><?= $this->session->flashdata('pesan_maintenance') ?></p>

              <div class="modal-footer">
                <p>Proses <?= $tabel5_alias ?> <?= $tl5->id_kelas; ?>?</p>
                <button class="btn btn-success" type="submit">Ya</button>

              </div>
            </form>

          </div>
        </div>
      </div>
    <?php } ?>
  <?php endforeach ?>
<?php endforeach ?>