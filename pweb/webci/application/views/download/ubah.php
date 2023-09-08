<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="hlm_single" id="latar">
    <h2>Ubah Download</h2>
    <div style="color: red;"><?php echo validation_errors(); ?></div>
    <?php echo form_open("download/ubh/".$download->id); ?>
    <label for="title"><b> Judul</b></label>
    <input type="text" name="title" value="<?php echo set_value('title', $download->title); ?>" placeholder="Judul"><br>
    <textarea id="ckeditor" name="tek"><?php echo set_value('tek', $download->tek); ?></textarea><br>
    <select name="category">
        <option <?php if ($download->category == '' ) echo 'selected' ; ?> value="">Pilih Kategori</option>
        <option <?php if ($download->category == 'Komputer' ) echo 'selected' ; ?> value="Komputer">Komputer</option>
        <option <?php if ($download->category == 'Bisnis' ) echo 'selected' ; ?> value="Bisnis">Bisnis</option>
        <option <?php if ($download->category == 'Hobi' ) echo 'selected' ; ?> value="Hobi">Hobi</option>
        <option <?php if ($download->category == 'Seni' ) echo 'selected' ; ?> value="Seni">Seni</option>
        <option <?php if ($download->category == 'Musik' ) echo 'selected' ; ?> value="Musik">Musik</option>
        <option <?php if ($download->category == 'Olah raga' ) echo 'selected' ; ?> value="Olah raga">Olah raga</option>
        <option <?php if ($download->category == 'Pelajaran' ) echo 'selected' ; ?> value="Pelajaran">Pelajaran</option>
    </select><br>
    <hr>
    <input type="hidden" name="user_id" value=" <?php echo $this->session->userdata('user_id');?>">
    <input type="submit" name="submit" value="Ubah">
    <a href="<?php echo base_url(); ?>"><input type="button" value="Batal"></a>
    <?php echo form_close(); ?>
</div>
<script src="<?php echo base_url().'file/ckeditor/ckeditor.js'?>"></script>
<script> CKEDITOR.replace( 'ckeditor' ); </script>