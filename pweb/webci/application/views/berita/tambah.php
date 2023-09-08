<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="hlm_single" id="latar">
    <h2>Tambahkan Berita</h2><hr/>
    <div style="color: red;"><?php echo validation_errors(); ?></div>
    <?php echo form_open_multipart('berita/tbh');?>
    <input type="text" name="title" placeholder="Judul Berita" required/><br/>
    <textarea id="ckeditor" name="tek" required></textarea><br/>
  <select name="category">
    <option value="">Pilih Kategori</option>
    <option value="Komputer">Komputer</option>
    <option value="Bisnis">Bisnis</option>
    <option value="Hobi">Hobi</option>
    <option value="Seni">Seni</option>
    <option value="Musik">Musik</option>
    <option value="Olah raga">Olah raga</option>
    <option value="Pelajaran">Pelajaran</option>
  </select><br><br>
    <input type="file" name="fileupload" required><br>
    <input type="hidden" name="user_id" value=" <?php echo $this->session->userdata('user_id');?>">
    <button class="button_utm" type="submit">Publish</button>
  <?php echo form_close(); ?>
</div>
<script src="<?php echo base_url().'file/ckeditor/ckeditor.js'?>"></script>
<script> CKEDITOR.replace( 'ckeditor' ); </script>