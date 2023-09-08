<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="hlm_single" id="latar">
     <p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
      <p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>
      <h2>Pengaturan Berita</h2>
      <hr>
    <a href='<?php echo base_url("berita/tbh"); ?>'> <div class="button_utm" style="padding: 10px 2px;width: 120px">Tulis Berita</div></a>
    <table border='1' cellpadding='3'>
        <tr>
            <th>ID</th>
            <th style="width: 100%">JUDUL</th>
            <th colspan='2'>AKSI</th>
        </tr>
        <?php
        if( ! empty($berita)){ foreach($berita as $item){echo 
           '<tr>
            <td>'.$item['id'].'</td>
            <td>'.$item['title'].'</td>
            <td><a href='.base_url('berita/ubh/'.$item['id']).'><div class="button_ubh">Ubah</div></a></td>
            <td><a href='.base_url('berita/hps/'.$item['id']).'><div class="button_hps">Hapus</div></a></td>
            </tr>';    }
        }else{
        echo '<tr><td align="center" colspan="7">Berita Tidak Tersedia</td></tr>';
        }
        ?>
    </table>
    <div class="nmr_style"><?php echo $links; ?></div> 
</div>