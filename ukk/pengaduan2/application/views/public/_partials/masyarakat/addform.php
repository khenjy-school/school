<base href="<?php echo base_url(); ?>">
<!--tambah masyarakat-->

<form action="<?= site_url('masyarakat/tambah'); ?>" method="POST">
  <div class="form-group col-md-6">
    <label for="inputNik">Nik</label>
    <input name="txtnik" type="text" class="form-control" id="inputNik" required>
  </div>

  <div class="form-row col-md-6">
    <div class="form-group col-md-6">
      <label for="inputNama">Nama</label>
      <input name="txtnama" type="text" class="form-control" id="inputNama" required>
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

  <div class="form-group col-md-6">
    <label for="inputTelp">Telp</label>
    <input name="txttelp" type="text" class="form-control" id="inputTelp" required>
  </div>

  <div class="form-group col-md-6">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="checkKonfirmasi" required>
      <label class="form-check-label" for="checkKonfirmasi">
        Saya ingin membuat akun
      </label>
    </div>
  </div>

  <a class="btn btn-secondary" href="<?php echo site_url('masyarakat/index'); ?>">BATAL</a>
  <button type="reset" class="btn btn-danger">RESET</button>
  <button name="btnsubmit" type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin?')">Tambah</button>
</form>