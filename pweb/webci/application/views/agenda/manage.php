<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="hlm_single" id="latar">
  <p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
  <p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>
  <h2>Pengaturan Agenda</h2>
  <hr>
    <a href='<?php echo base_url("agenda/tbh"); ?>'> <div class="button_utm" style="padding: 10px 2px;width: 120px">Buat Agenda</div></a>
    <table border='1' cellpadding='3'>
        <tr>
            <th>Mulai</th>
            <th style="width: 100%">Agenda (lokasi)</th>
            <th colspan='2'>AKSI</th>
        </tr>
        <?php
        if( ! empty($agenda)){ foreach($agenda as $item){echo 
           '<tr>
            <td>'.date('d-m- Y', strtotime($item['mulai'])).'</td>
            <td>'.$item['title'].' ('.$item['lokasi'].')</td>
            <td><a href='.base_url('agenda/ubh/'.$item['id']).'><div class="button_ubh">Ubah</div></a></td>
            <td><a href='.base_url('agenda/hps/'.$item['id']).'><div class="button_hps">Hapus</div></a></td>
            </tr>';    }
        }else{
        echo '<tr><td align="center" colspan="7">Agenda Tidak Tersedia</td></tr>';
        }
        ?>
    </table>
    <div class="nmr_style"><?php echo $links; ?></div> 
</div>