<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $user_id=$this->session->userdata('user_id'); $dtuser = $this->db->query("SELECT * FROM user WHERE id=$user_id LIMIT 1;"); $dsr = $dtuser->result_array(); ?>

<div class="hl-login">
    <p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
    <p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>

      <?php echo form_open('user/reset'); ?>
      <div class="container">
        <h1 style="text-align: center;">UBAH PASSWORD</h1>
        <p><?php echo 'Nama : '.$dsr[0]['fullname'].' | Username : '.$dsr[0]['username']; ?></p>
        <hr>

        <label for="passlama"><b><i class="fa fa-key"></i> Password Lama</b></label>
        <input type="password" placeholder="Password Lama" name="passlama" required>
        <span style="color:red"><?php echo form_error('passlama'); ?></span>

        <label for="password"><b><i class="fa fa-key"></i> Password Baru</b></label>
        <input type="password" placeholder="Password Baru" name="password" minlength="5" maxlength="12" required>
        <span style="color:red"><?php echo form_error('password'); ?></span>

        <label for="cpassword"><b><i class="fa fa-key"></i> Ulangi Password</b></label>
        <input type="password" placeholder="Password Baru" name="cpassword" minlength="5" maxlength="12" required>
        <span style="color:red"><?php echo form_error('cpassword'); ?></span>
        
        <div class="clearfix">
          <button type="submit" class="signupbtn">Ubah</button>
        </div>
      </div>
    <?php echo form_close(); ?>
</div>