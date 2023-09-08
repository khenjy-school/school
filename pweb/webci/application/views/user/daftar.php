<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="hl-login">
  <p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
  <p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>
  <?php echo form_open('user/daftar'); ?>
  <div class="container">
    <h1>PENDAFTARAN</h1>
    <p>Harap isi formulir ini untuk membuat akun.</p>
    <hr>

    <label for="fullname"><b>Nama Lengkap</b></label>
    <input type="text" placeholder="Nama Lengkap" name="fullname" />
    <span style="color:red"><?php echo form_error('fullname'); ?></span>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Username" name="username" value="<?php echo set_value('username'); ?>" />
    <span style="color:red"><?php echo form_error('username'); ?></span>

    <label for="password"><b><i class="fa fa-key"></i> Password</b></label>
    <input type="password" placeholder="Masukkan Password" name="password" minlength="5" maxlength="12" required>
    <span style="color:red"><?php echo form_error('password'); ?></span>

    <label for="cpassword"><b><i class="fa fa-key"></i> Ulangi Password</b></label>
    <input type="password" placeholder="Masukkan Password" name="cpassword" minlength="5" maxlength="12" required>
    <span style="color:red"><?php echo form_error('cpassword'); ?></span>

    <p>Dengan membuat akun, Anda menyetujui <a target="_blank" href="<?php echo base_url(); ?>term/" style="color:dodgerblue">Syarat & Ketentuan</a>.</p>

    <div class="clearfix">
      <button type="submit" class="signupbtn">Daftar</button>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>