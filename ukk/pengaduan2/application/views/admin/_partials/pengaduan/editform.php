<!--edit pengaduan-->

<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group col-md-6">
    <label for="inputId_pengaduan">Id Pengaduan</label>
    <input name="txtid_pengaduan" type="text" class="form-control" id="inputId_pengaduan" disabled value="<?php echo $pengaduan->id_pengaduan ?>">
  </div>

  <div class="form-row col-md-6">
    <div class="form-group col-md-6">
      <label for="inputTgl_pengaduan">Tanggal Pengaduan</label>
      <input name="txttgl_pengaduan" type="date" class="form-control" id="inputTgl_pengaduan" value="<?php echo $pengaduan->tgl_pengaduan ?>">
    </div>

    <div class="form-group col-md-6">
      <label for="nik">Nik</label>
      <select name="txtnik" class="form-control" id="inputNik" required>
        <option selected hidden><?php echo $pengaduan->nik ?></option>
        <?php foreach ($masyarakat as $s) { ?>
          <option><?php echo $s->nik ?></option>
        <?php } ?>
      </select>
    </div>
  </div>

  <div class="form-group col-md-6">
    <label for="textareaIsi_laporan">Isi Laporan</label>
    <textarea name="txtisi_laporan" class="form-control" id="textareaIsi_laporan" rows="3"><?php echo $pengaduan->isi_laporan ?></textarea>
  </div>

  <div class="form-row col-md-6">
    <div class="form-group col-md-6">
      <label for="formFoto">Foto</label>
      <input name="txtfoto" type="file" class="form-control-file" id="formFoto" required value="<?php echo $pengaduan->foto ?>">
      <small>Nama file tanpa spasi (contoh : tiresma3dnmaxxis)</small>
    </div>

    <div class="form-group col-md-6">
      <label for="inputHp">Status</label>
      <select name="txtstatus" class="form-control" id="inputStatus">
        <option selected hidden><?php echo $pengaduan->status ?></option>
        <option>0</option>
        <option>proses</option>
        <option>selesai</option>
      </select>
    </div>
  </div>

  <a class="btn btn-secondary" href="<?php echo site_url('pengaduan/index'); ?>">BATAL</a>
  <button class="btn btn-danger" type="reset">RESET</button>
  <button class="btn btn-success" type="submit" name="btnsimpan" onclick="return confirm('Apakah anda yakin?')">SIMPAN</button>
</form>