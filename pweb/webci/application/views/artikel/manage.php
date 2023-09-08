<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="hlm_single" id="latar">
     <p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
      <p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>
      <h2>Pengaturan Artikel</h2>
      <hr>
    <a href='<?php echo base_url("artikel/tbh"); ?>'> <div class="button_utm" style="padding: 10px 2px;width: 120px">Tulis Artikel</div></a>
    <table border='1' cellpadding='3'>
        <tr>
            <th>Penulis</th>
            <th style="width: 100%">Judul</th>
            <th colspan='2'>Aksi</th>
        </tr>
        <?php
        if( ! empty($artikel)){ foreach($artikel as $item){echo 
           '<tr>
            <td>'.$item['fullname'].'</td>
            <td>'.$item['title'].'</td>
            <td><a href='.base_url('artikel/ubh/'.$item['id']).'><div class="button_ubh">Ubah</div></a></td>
            <td><a href='.base_url('artikel/hps/'.$item['id']).'><div class="button_hps">Hapus</div></a></td>
            </tr>';    }
        }else{
        echo '<tr><td align="center" colspan="7">Artikel Tidak Tersedia</td></tr>';
        }
        ?>
    </table>
    <div class="nmr_style"><?php echo $links; ?></div> 
</div>