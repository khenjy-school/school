<base href="<?php echo base_url(); ?>">
<!--login masyarakat-->

<form class="user" method="post" action="<?= site_url('masyarakat/login'); ?>">
  <div class="form-group">
    <label for="inputNik">Nik</label>
    <input type="text" class="form-control form-control-user" id="inputNik" name="txtnik" placeholder="">
  </div>
  <div class="form-group">
    <label for="inputPassword">Password</label>
    <input type="password" class="form-control form-control-user" id="inputPassword" name="txtpassword" placeholder="">
  </div>
  <small>Belum punya akun? <span><a href="<?= site_url('masyarakat/signup'); ?>">Sign Up</a> </span></small>
  <div class="centering">
    <button type="submit" class="login" name="btnlogin">LOGIN</button>
  </div>
</form>