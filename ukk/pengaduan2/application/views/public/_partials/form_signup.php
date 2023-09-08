<!-- signup outlet -->
<form action="" method="POST">
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="txtnama" id="nama" aria-describedby="helpId" placeholder="masukkan nama di sini">
  </div>

  <div class="form-group">
    <label for="outlet">Outlet</label>
    <input type="text" class="form-control" name="txtoutlet" id="outlet" placeholder="masukkan outlet di sini" aria-describedby="helpId" required="required">
  </div>

  <div class="form-group">
    <label for="Hp">Hp</label>
    <input type="text" class="form-control" name="txthp" id="hp" placeholder="masukkan hp di sini" aria-describedby="helpId" required="required">
  </div>

  <div class="form-group">
    <label for="email">Email<label>
        <input type="text" class="form-control" name="txtemail" id="email" placeholder="masukkan email di sini" aria-describedby="helpId" required="required">
  </div>

  <div class="form-group">
    <label for="alamat">Alamat<label>
        <input type="text" class="form-control" name="txtalamat" id="alamat" placeholder="masukkan alamat di sini" aria-describedby="helpId" required="required">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="txtpassword" id="password" aria-describedby="helpId" placeholder="masukkan password di sini" required="required">
  </div>

  <div class="col-md-4 form-group">
    <label for="foto">Foto</label>
    <input type="file" class="form-control" name="txtfoto" id="foto" aria-describedby="helpId" placeholder="masukkan foto di sini">
  </div>

  <div class="form-group">
    <button class="btn btn-danger w-25" type="reset" name="btnreset">RESET</button>
    <button class="btn btn-success w-25" type="submit" name="btnsimpan">SIMPAN</button>
  </div>

  <div class="form-group">
    <span>Sudah punya akun?</span>
    <a href="<?php echo site_url('outlet/login'); ?>" name="btntampillogin">Login Sekarang</a>
  </div>
</form>