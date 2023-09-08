<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="hlm_single" id="latar">
     <p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
     <p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>
      <h2>User Manager</h2>
      <hr>
    <a href='<?php echo base_url("user/daftar"); ?>'> <div class="button_utm" style="padding: 10px 2px;width: 120px">Tambah User</div></a>
    <table border='1' cellpadding='3'>
        <tr>
            <th>Username</th>
            <th style="width: 100%">Nama</th>
            <th colspan='2'>AKSI</th>
        </tr>
        <?php
        if( ! empty($user)){ foreach($user as $item){echo 
           '<tr>
            <td>'.$item['username'].'</td>
            <td>'.$item['fullname'].'</td>
            <td><a href='.base_url('user/ubh/'.$item['id']).'><div class="button_ubh">Ubah</div></a></td>
            <td><a href='.base_url('user/hps/'.$item['id']).'><div class="button_hps">Hapus</div></a></td>
            </tr>';    }
        }else{
        echo '<tr><td align="center" colspan="7">User Tidak Tersedia</td></tr>';
        }
        ?>
    </table>
    <div class="nmr_style"><?php echo $links; ?></div> 
</div>