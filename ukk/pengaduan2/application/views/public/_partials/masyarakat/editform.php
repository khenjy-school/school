<!--edit masyarakat-->
<form action="" method="POST">
  <div class="form-group col-md-6">
    <label for="inputNik">Nik</label>
    <input name="txtnik" type="text" class="form-control" id="inputNik" disabled value="<?php echo $masyarakat->nik ?>">
  </div>

  <div class="form-row col-md-6">
    <div class="form-group col-md-6">
      <label for="inputNama">Nama</label>
      <input name="txtnama" type="text" class="form-control" id="inputNama" required value="<?php echo $masyarakat->nama ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword">Password</label>
      <input name="txtpassword" type="password" class="form-control" id="inputPassword" required value="<?php echo $masyarakat->password ?>">
    </div>
  </div>

  <div class="form-row col-md-6">
    <div class="form-group col-md-6">
      <label for="inputUsername">Username</label>
      <input name="txtusername" type="text" class="form-control" id="inputUsername" required value="<?php echo $masyarakat->username ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword">Konfirmasi Password</label>
      <input name="txtkonfirm" type="password" class="form-control" id="inputPassword" required>
    </div>
  </div>

  <div class="form-group col-md-6">
    <label for="inputTelp">Telp (contoh : 812345678901)</label>
    <input name="txttelp" type="text" class="form-control" id="inputTelp" required value="<?php echo $masyarakat->telp ?>">
  </div>

  <div class="form-group col-md-6">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="checkKonfirmasi" required>
      <label class="form-check-label" for="checkKonfirmasi">
        Saya ingin mengubah akun
      </label>
    </div>
  </div>

  <a class="btn btn-secondary" href="<?php echo site_url('masyarakat/index'); ?>">BATAL</a>
  <button type="reset" class="btn btn-danger">RESET</button>
  <button name="btnsubmit" type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin?')">Tambah</button>
</form>