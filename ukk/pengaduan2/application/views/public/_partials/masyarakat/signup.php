<!-- signup masyarakat -->
<form action="<?= site_url('masyarakat/signup'); ?>" method="POST">
  <div class="form-group">
    <label for="inputNik">Nik</label>
    <input type="text" class="form-control form-control-user" id="inputNik" name="txtnik" placeholder="">
  </div>

  <div class="form-group">
    <label for="inputNama">Nama Lengkap/Full Name</label>
    <input type="text" class="form-control form-control-user" id="inputNama" name="txtnama" placeholder="">
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
    <label for="inputKonfirm">Konfirmasi Password</label>
    <input type="password" class="form-control form-control-user" name="txtkonfirm" id="inputKonfirm" placeholder="">
  </div>

  <div class="form-group">
    <label for="inputTelp">Telp (contoh : 812345678901)</label>
    <input name="txttelp" type="text" class="form-control" id="inputTelp" required placeholder="masukkan telp di sini">
  </div>

  <small>Sudah punya akun? <span><a href="<?= site_url('masyarakat/login'); ?>">Login</a> </span></small>
  <div class="centering">
    <button type="submit" class="register" name="btnsignup">SIGNUP</button>
  </div>
</form>