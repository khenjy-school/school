<div class="main">
<div class="head">
            <a href="<?= base_url('index.php/Controller/settings') ?>"><span class="fas fa-arrow-left"></span></a>
        </div>
    <?php foreach($set as $j) {?>
        <?php echo form_open_multipart('Controller/edit_settings');?>
        <label for="">Judul</label><br>
        <input type="text" value="<?= $j->judul?>" name="judul"><br><br>

        <label for="">Favicon</label><br>
        <input type="file" name="img" class="img">
        <img src="<?= base_url()?>img/favicon/<?= $j->favicon; ?>" width="50px" height="50px"><br><br>

        <label for="">Description</label><br>
        <input type="text" value="<?=$j->description?>" name="desc"><br>

        <input type="hidden" name="id" value="<?= $j->id; ?>"><br>

        <button type="submit" class="submit">Submit</button>
        <?php echo form_close();?>
    <?php }?>

</div>