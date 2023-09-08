<!--edit tanggapan-->
<form action="" method="POST">
  <div class="form-group col-md-6">
    <label for="inputId_tanggapan">Id Tanggapan</label>
    <input name="txtid_tanggapan" class="form-control" id="inputId_tanggapan" disabled value="<?php echo $tanggapan->id_tanggapan ?>">
  </div>

  <div class="form-row col-md-6">
    <div class="form-group col-md-6">
      <label for="inputId_pengaduan">Id pengaduan</label>
      <input name="txtid_pengaduan" class="form-control" id="inputId_pengaduan" disabled value="<?php echo $tanggapan->id_pengaduan ?>">
    </div>

    <div class="form-group col-md-6">
      <label for="inputTgl_tanggapan">Tanggal tanggapan</label>
      <input name="txttgl_tanggapan" type="date" class="form-control" id="inputTgl_tanggapan" value="<?php echo $tanggapan->tgl_tanggapan ?>">
    </div>
  </div>

  <div class="form-group col-md-6">
    <label for="textareaTanggapan">Tanggapan</label>
    <textarea name="txttanggapan" class="form-control" id="textareaTanggapan" rows="3"><?php echo $tanggapan->tanggapan ?></textarea>
  </div>

  <div class="form-group col-md-6">
    <label for="inputId_petugas">Id Petugas</label>
    <select name="txtid_petugas" class="form-control" id="inputId_petugas">
      <option selected hidden><?php echo $tanggapan->id_petugas ?></option>
      <?php foreach ($petugas as $s) { ?>
        <option><?php echo $s->id_petugas ?></option>
      <?php } ?>
    </select>
  </div>

  <a class="btn btn-secondary" href="<?php echo site_url('tanggapan/index'); ?>" name="btnbatal">BATAL</a>
  <button class="btn btn-danger" type="reset" name="btnreset">RESET</button>
  <button class="btn btn-success" type="submit" name="btnsimpan" onclick="return confirm('Apakah anda yakin?')">SIMPAN</button>
</form>