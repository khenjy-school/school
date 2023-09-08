<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="hl-login">
  <p><?php echo $this->session->flashdata('verify_msg'); ?></p>
  <p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
  <p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>
  <?php echo form_open('user/login'); ?>
  <p class="tek">Login</p>
    <div class="container">
      <label for="username"><b><i class="fa fa-user"></i> Username</b></label>
      <input type="text" placeholder="Masukkan Username" name="username" required>
      <span style="color:red"><?php echo form_error('username'); ?></span>
      <label for="password"><b><i class="fa fa-key"></i> Password</b></label>
      <input type="password" placeholder="Masukkan Password" name="password" minlength="5" maxlength="12" required>
      <span style="color:red"><?php echo form_error('password'); ?></span>
      <button type="submit">Login</button>
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="cancelbtn">Batal</button>
      <span class="psw">Belum mendaftar? <a href="<?php echo base_url();?>user/daftar/">DAFTAR</a></span>
    </div>
  <?php echo form_close(); ?>
</div>