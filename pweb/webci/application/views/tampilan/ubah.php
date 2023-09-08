<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="hlm_single" id="latar">
  <p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
  <p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>    
    <h2>Pengaturan Tampilan / Web Manager</h2>
    <div style="color: red;"><?php echo validation_errors(); ?></div>
    <?php echo form_open("tampilan/ubh/".$tampilan->id); ?>

        <label for="namaweb"><b>Nama Web</b></label>
        <input type="text" name="namaweb" value="<?php echo set_value('namaweb', $tampilan->namaweb); ?>" placeholder="namaweb"><br>

        <label for="hakcipta"><b>Hakcipta</b></label>
        <input type="text" name="hakcipta" value="<?php echo set_value('hakcipta', $tampilan->hakcipta); ?>" placeholder="hakcipta"><br>

        <label for="telp"><b>Telp</b></label>
        <input type="text" name="telp" value="<?php echo set_value('telp', $tampilan->telp); ?>" placeholder="telp"><br>

        <label for="is_daftar"><b> Apakah User Bisa Mendaftar Dari Form Pendaftaran ?</b></label><br>
        <p style="font-size: 11px">Jika "Tidak" maka hanya Admin yang bisa menambahkan user baru</p>
        <select name="is_daftar">
          <option <?php if ($tampilan->is_daftar == '1' ) echo 'selected' ; ?> value="1">Bisa</option>
          <option <?php if ($tampilan->is_daftar == '0' ) echo 'selected' ; ?> value="0">Tidak</option>
        </select><br><br>

        <label for="term"><b>Term</b></label>
        <textarea id="ckeditor" name="term"><?php echo set_value('term', $tampilan->term); ?></textarea><br>

        <label for="privasi"><b>privasi</b></label>
        <textarea id="ckeditor1" name="privasi"><?php echo set_value('privasi', $tampilan->privasi); ?></textarea><br>
    
        <hr>
        <input type="submit" name="submit" value="Ubah">
        <a href="<?php echo base_url(); ?>"><input type="button" value="Batal"></a>
    <?php echo form_close(); ?>
</div>
<script src="<?php echo base_url().'file/ckeditor/ckeditor.js'?>"></script>
<script> CKEDITOR.replace( 'ckeditor' ); </script>
<script> CKEDITOR.replace( 'ckeditor1' ); </script>