<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="hl-login">
  <div class="container" style="background: #fff;border:3px solid #e4e8eb;">
    <p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
    <p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>
    <h2><?php echo $dsr[0]['fullname']; ?></h2>
    <table border="1" cellpadding="2" style="width:100%">
      <tbody>
        <tr>
          <td style="width: 120px">Nama</td>
          <td><?php echo $dsr[0]['fullname']; ?></td>
        </tr>
        <tr>
          <td>Username</td>
          <td><?php echo $dsr[0]['username']; ?></td>
        </tr>
        <tr>
          <td>Hak akses</td>
          <td><?php if ($dsr[0]['level'] === '1') {
                echo 'Admin';
              } else {
                echo 'Umum';
              }; ?></td>
        </tr>
      </tbody>
    </table>
    <br>
    <hr />
    <div class="ktk_flx">
      <a href="<?php echo base_url(); ?>user/reset/">
        <div class="tombol_flx">Ubah Password</div>
      </a> <?php if ($dsr[0]['level'] === '1') {
              echo '<a href="' . base_url() . 'user/manage/"><div class="tombol_flx">User Manager</div></a> <a href="' . base_url() . 'tampilan/ubh/1/"><div class="tombol_flx">Web Manager</div></a>';
            }; ?>
    </div>
  </div>
</div>
<br>