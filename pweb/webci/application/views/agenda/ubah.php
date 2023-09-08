<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="hlm_single" id="latar">
    <h2>Ubah Agenda</h2>
    <div style="color: red;"><?php echo validation_errors(); ?></div>
    <?php echo form_open("agenda/ubh/".$agenda->id); ?>
        <label for="title"><b>Nama Agenda</b></label>
        <input type="text" name="title" value="<?php echo set_value('title', $agenda->title); ?>" placeholder="Nama Acara"><br>
        <label for="lokasi"><b>Lokasi</b></label>
        <input type="text" name="lokasi" value="<?php echo set_value('lokasi', $agenda->lokasi); ?>" placeholder="Lokasi"><br>
        <label for="mulai"><b>Mulai</b></label>
        <input type="date" name="mulai" value="<?php echo set_value('mulai', $agenda->mulai); ?>" required/><br/>
        <label for="selesai"><b>Selesai</b></label>
        <input type="date" name="selesai" value="<?php echo set_value('selesai', $agenda->selesai); ?>" required/><br/>
        <textarea id="ckeditor" name="tek"><?php echo set_value('tek', $agenda->tek); ?></textarea><br>
        <select name="category">
          <option <?php if ($agenda->category == '' ) echo 'selected' ; ?> value="">Pilih Kategori</option>
          <option <?php if ($agenda->category == 'Komputer' ) echo 'selected' ; ?> value="Komputer">Komputer</option>
          <option <?php if ($agenda->category == 'Bisnis' ) echo 'selected' ; ?> value="Bisnis">Bisnis</option>
          <option <?php if ($agenda->category == 'Hobi' ) echo 'selected' ; ?> value="Hobi">Hobi</option>
          <option <?php if ($agenda->category == 'Seni' ) echo 'selected' ; ?> value="Seni">Seni</option>
          <option <?php if ($agenda->category == 'Musik' ) echo 'selected' ; ?> value="Musik">Musik</option>
          <option <?php if ($agenda->category == 'Olah raga' ) echo 'selected' ; ?> value="Olah raga">Olah raga</option>
          <option <?php if ($agenda->category == 'Pelajaran' ) echo 'selected' ; ?> value="Pelajaran">Pelajaran</option>
        </select><br>
        <hr>
          <input type="hidden" name="user_id" value=" <?php echo $this->session->userdata('user_id');?>">        
        <input type="submit" name="submit" value="Ubah">
        <a href="<?php echo base_url(); ?>"><input type="button" value="Batal"></a>
    <?php echo form_close(); ?>
</div>
<script src="<?php echo base_url().'file/jquery/jquery-2.2.3.min.js'?>"></script>
<script src="<?php echo base_url().'file/ckeditor/ckeditor.js'?>"></script>
<script type="text/javascript">
$(function () { CKEDITOR.replace('ckeditor'); });
</script>
