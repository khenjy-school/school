<!-- login outlet -->
<form action="" method="POST">
  <div class="form-group mx-md-5">
    <label for="hp">No hp</label>
    <input type="text" class="form-control" name="txthp" id="hp" placeholder="masukkan hp di sini" aria-describedby="helpId" required="required">
  </div>

  <div class="form-group mx-md-5">
    <label for="password">Pin</label>
    <input type="pin" class="form-control" name="txtpin" id="pin" aria-describedby="helpId" placeholder="masukkan pin di sini" required="required">
  </div>

  <div class="form-group mx-md-5">
    <button class="btn btn-primary w-100" type="submit" name="btnlogin">LOGIN</button>
  </div>

  <div class="form-group mx-md-5">
    <span>Belum punya akun?</span>
    <a href="<?php echo site_url('outlet/signup'); ?>" name="btntampilsignup">Sign Up Sekarang</a>
  </div>
</form>