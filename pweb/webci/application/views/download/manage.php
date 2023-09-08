<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="hlm_single" id="latar">
     <p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
      <p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>
      <h2>Pengaturan Download</h2>
      <hr>
    <a href='<?php echo base_url("download/tbh"); ?>'> <div class="button_utm" style="padding: 10px 2px;width: 120px">Tambah File</div></a>
    <table border='1' cellpadding='3' style="margin: auto;">
        <tr>
            <th>Nama file</th>
            <th>Ext</th>
            <th>Ukuran</th>
            <th colspan='2'>Aksi</th>
        </tr>
        <?php
        if( ! empty($download)){ foreach($download as $item){echo 
           '<tr>
            <td>'.$item['title'].'</td>
            <td>'.$item['ext'].'</td>
            <td>'.$item['size'].' kb</td>
            <td><a href='.base_url('download/ubh/'.$item['id']).'><div class="button_ubh">Ubah</div></a></td>
            <td><a href='.base_url('download/hps/'.$item['id']).'><div class="button_hps">Hapus</div></a></td>
            </tr>';    }
        }else{
        echo '<tr><td align="center" colspan="7">Download Tidak Tersedia</td></tr>';
        }
        ?>
    </table>
    <div class="nmr_style"><?php echo $links; ?></div> 
</div>