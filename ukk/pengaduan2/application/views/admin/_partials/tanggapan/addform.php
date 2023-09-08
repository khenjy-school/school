<base href="<?php echo base_url(); ?>">
<!-- tambah tanggapan-->

<form enctype="multipart/form-data" action="<?= site_url('tanggapan/tambah'); ?>" method="POST">
  <div class="form-row col-md-6">
    <div class="form-group col-md-6">
      <label for="inputId_pengaduan">Id Pengaduan</label>
      <input name="txtid_pengaduan" class="form-control" id="inputId_pengaduan" readonly value="<?php echo $pengaduan->id_pengaduan ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputTgl_tanggapan">Tanggal tanggapan</label>
      <input name="txttgl_tanggapan" type="date" class="form-control" id="inputTgl_tanggapan" value="<?php echo date('Y-m-j'); ?>">
    </div>
  </div>

  <div class="form-row col-md-6">
    <div class="form-group col-md-8">
      <label for="textareaIsi_laporan">Isi Laporan</label>
      <textarea name="txtisi_laporan" class="form-control" id="textareaIsi_laporan" rows="3" readonly><?php echo $pengaduan->isi_laporan ?></textarea>
    </div>
    <div class="form-group col-md-4">
      <label for="inputFoto">Foto</label>
      <img class="img-fluid rounded" src="<?php echo base_url('/upload/pengaduan/' . $pengaduan->foto) ?>" id="inputFoto" readonly />
    </div>
  </div>

  <div class="form-group col-md-6">
    <label for="textareaTanggapan">Tanggapan</label>
    <textarea name="txttanggapan" class="form-control" id="textareaTanggapan" rows="3"></textarea>
  </div>

  <div class="form-group col-md-6">
    <label for="inputId_petugas">Id Petugas</label>
    <select name="txtid_petugas" class="form-control" id="inputId_petugas" required>
      <option value="" hidden selected>masukkan id petugas...</option>
      <?php foreach ($petugas as $s) { ?>
        <option><?php echo $s->id_petugas ?></option>
      <?php } ?>
    </select>
  </div>

  <a class="btn btn-secondary" href="<?php echo site_url('tanggapan/index'); ?>" name="btnbatal">BATAL</a>
  <button class="btn btn-danger" type="reset" name="btnreset">RESET</button>
  <button class="btn btn-success" type="submit" name="btnsimpan" onclick="return confirm('Apakah anda yakin?')">SIMPAN</button>
</form>