<base href="<?php echo base_url(); ?>">
<!-- tambah pengaduan-->

<form enctype="multipart/form-data" action="<?= site_url('main/tambah_pengaduan'); ?>" method="POST">
  <div class="form-row col-md-6">
    <div class="form-group col-md-6">
      <label for="inputTgl_pengaduan">Tanggal Pengaduan</label>
      <input name="txttgl_pengaduan" type="date" class="form-control" id="inputTgl_pengaduan">
    </div>

    <div class="form-group col-md-6">
      <label for="inputNik">Nik</label>
      <select name="txtnik" class="form-control" id="inputNik" required>
        <option value="" disabled hidden selected>masukkan nik terdaftar...</option>
        <?php foreach ($masyarakat as $s) { ?>
          <option><?php echo $s->nik ?></option>
        <?php } ?>
      </select>
    </div>
  </div>

  <div class="form-group col-md-6">
    <label for="textareaIsi_laporan">Isi laporan</label>
    <textarea name="txtisi_laporan" class="form-control" id="textareaIsi_laporan" rows="3"></textarea>
  </div>

  <div class="form-row col-md-6">
    <div class="form-group col-md-6">
      <label for="formFoto">Foto</label>
      <input name="txtfoto" type="file" class="form-control-file" id="formFoto">
      <small>Nama file tanpa spasi (contoh : tiresma3dnmaxxis)</small>
    </div>

    <div class="form-group col-md-6">
      <label for="inputStatus">Status</label>
      <select name="txtstatus" class="form-control" id="inputStatus">
        <option>0</option>
        <option>proses</option>
        <option>selesai</option>
      </select>
    </div>
  </div>

  <a class="btn btn-secondary" href="<?php echo site_url('main/pengaduan'); ?>">BATAL</a>
  <button class="btn btn-danger" type="reset">RESET</button>
  <button class="btn btn-success" type="submit" name="btnsimpan" onclick="return confirm('Apakah anda yakin?')">TAMBAH</button>
</form>