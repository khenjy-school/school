<!--edit petugas-->
<form action="" method="POST">
  <div class="form-group col-md-6">
    <label for="inputId_petugas">Id Petugas</label>
    <input name="txtid_petugas" type="text" class="form-control" disabled id="inputId_petugas" value="<?php echo $petugas->id_petugas ?>">
  </div>

  <div class="form-row col-md-6">
    <div class="form-group col-md-6">
      <label for="inputNama_petugas">Nama</label>
      <input name="txtnama_petugas" type="text" class="form-control" id="inputNama_petugas" required value="<?php echo $petugas->nama_petugas ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword">Password</label>
      <input name="txtpassword" type="password" class="form-control" id="inputPassword" required value="<?php echo $petugas->password ?>">
    </div>
  </div>

  <div class="form-row col-md-6">
    <div class="form-group col-md-6">
      <label for="inputUsername">Username</label>
      <input name="txtusername" type="text" class="form-control" id="inputUsername" required value="<?php echo $petugas->username ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputKonfirmasi">Konfirmasi Password</label>
      <input name="txtkonfirmasi" type="password" class="form-control" id="inputKonfirmasi" required>
    </div>
  </div>

  <div class="form-row col-md-6">
    <div class="form-group col-md-6">
      <label for="inputTelp">Telp (contoh : 812345678901)</label>
      <input name="txttelp" type="text" class="form-control" id="inputTelp" required value="<?php echo $petugas->telp ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputLevel">Level</label>
      <select name="txtlevel" class="form-control" id="inputLevel">
        <option selected hidden><?php echo $petugas->level ?></option>
        <option>petugas</option>
        <option>admin</option>
      </select>
    </div>
  </div>

  <a class="btn btn-secondary" href="<?php echo site_url('petugas/index'); ?>" name="btnbatal">BATAL</a>
  <button class="btn btn-danger" type="reset" name="btnreset">RESET</button>
  <button class="btn btn-success" type="submit" name="btnsimpan" onclick="return confirm('Apakah anda yakin?')">SIMPAN</button>
</form>