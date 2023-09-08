<!-- signup petugas -->
<form action="<?= site_url('petugas/signup'); ?>" method="POST">
  <div class="form-group">
    <label for="inputNama_Petugas">Nama Lengkap/Full Name</label>
    <input type="text" class="form-control form-control-user" id="inputNama_petugas" name="txtnama_petugas" placeholder="">
  </div>

  <div class="form-group">
    <label for="inputUsername">Username</label>
    <input type="text" class="form-control form-control-user" id="inputUsername" name="txtusername" placeholder="">
  </div>

  <div class="form-group">
    <label for="inputPassword">Password</label>
    <input type="password" class="form-control form-control-user" name="txtpassword" id="inputPassword" placeholder="">
  </div>

  <div class="form-group">
    <label for="inputKonfirm">Konfirmasi Pin</label>
    <input type="password" class="form-control form-control-user" name="txtkonfirm" id="inputKonfirm" placeholder="">
  </div>

  <div class="form-group">
    <label for="inputTelp">Telp (contoh : 812345678901)</label>
    <input name="txttelp" type="text" class="form-control" id="inputTelp" required placeholder="masukkan telp di sini">
  </div>

  <div class="form-group">
    <label for="inputLevel">Level</label>
    <select name="txtlevel" class="form-control" id="inputLevel">
      <option selected>petugas</option>
      <option>admin</option>
    </select>
  </div>

  <small>Sudah punya akun? <span><a href="<?= site_url('petugas/login'); ?>">Login</a> </span></small>
  <div class="centering">
    <button type="submit" class="register" name="btnsignup">SIGNUP</button>
  </div>
</form>