<base href="<?php echo base_url(); ?>">
<!--tambah petugas-->

<form action="<?= site_url('petugas/tambah'); ?>" method="POST">
  <div class="form-row col-md-6">
    <div class="form-group col-md-6">
      <label for="inputNama_petugas">Nama</label>
      <input name="txtnama_petugas" type="text" class="form-control" id="inputNama_petugas" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword">Password</label>
      <input name="txtpassword" type="password" class="form-control" id="inputPassword" required>
    </div>
  </div>

  <div class="form-row col-md-6">
    <div class="form-group col-md-6">
      <label for="inputUsername">Username</label>
      <input name="txtusername" type="text" class="form-control" id="inputUsername" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputKonfirmasi">Konfirmasi Password</label>
      <input name="txtkonfirmasi" type="password" class="form-control" id="inputKonfirmasi" required>
    </div>
  </div>

  <div class="form-row col-md-6">
    <div class="form-group col-md-6">
      <label for="inputTelp">Telp (contoh : 812345678901)</label>
      <input name="txttelp" type="text" class="form-control" id="inputTelp" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputLevel">Level</label>
      <select name="txtlevel" class="form-control" id="inputLevel">
        <option selected>petugas</option>
        <option>admin</option>
      </select>
    </div>
  </div>

  <a class="btn btn-secondary" href="<?php echo site_url('petugas/index'); ?>" name="btnbatal">BATAL</a>
  <button class="btn btn-danger" type="reset" name="btnreset">RESET</button>
  <button class="btn btn-success" type="submit" name="btnsimpan" onclick="return confirm('Apakah anda yakin?')">TAMBAH</button>
</form>