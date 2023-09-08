<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div style="color: red;"><?php echo validation_errors(); ?></div>
<div class="hl-login">
  <p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
  <p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>
  <?php echo form_open("user/ubh/".$user->id); ?>
  <div class="container">
    <h1 style="text-align: center;">Perubahan Data<br>"<?php echo $user->username; ?>"</h1>
    <hr>
        <label for="fullname"><b> Nama</b></label>
        <input type="text" name="fullname" value="<?php echo set_value('fullname', $user->fullname); ?>" placeholder="fullname">
        <span style="color:red"><?php echo form_error('fullname'); ?></span>
        <label for="level"><b>Hak akses</b></label><br>
    <select name="level">
      <option <?php if ($user->level == '1' ) echo 'selected' ; ?> value="1">Admin</option>
      <option <?php if ($user->level == '2' ) echo 'selected' ; ?> value="2">Umum</option>
    </select><br><br>
      <p style="font-weight:normal; font-size: 12px; font-style: italic;">(Biarkan kosong jika tidak ingin mengubah password)</p>
    <label for="password"><b><i class="fa fa-key"></i> Password Baru</b></label>
    <input type="password" placeholder="Password Baru" name="password" minlength="4">
    <span style="color:red"><?php echo form_error('password'); ?></span>
    <label for="cpassword"><b><i class="fa fa-key"></i> Ulangi Password</b></label>
    <input type="password" placeholder="Password Baru" name="cpassword" minlength="4">
    <span style="color:red"><?php echo form_error('cpassword'); ?></span>
    <div class="clearfix">
      <button type="submit" class="signupbtn">Ubah</button>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>