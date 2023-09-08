<div class="main">
        <div class="head">
            <a href="<?= base_url('index.php/Controller/kategori') ?>"><span class="fas fa-arrow-left"></span></a>
            <h4>Edit Kategori</h4>
        </div>
        <div class="form">  
            <?php foreach($kategori as $k) {?>
            <?php echo form_open_multipart('Controller/proses_edit_kat');?>
                <input type="text" class="input" name="kategori" value="<?= $k->kategori ?>">
                <input type="hidden" name="id" value="<?= $k->id_kat; ?>"><br>

                <button type="submit" class="submit bg-success">Submit</button>
                <button type="reset" class="reset bg-danger">Reset</button>
            <?php echo form_close();?>
            <?php } ?>
        </div>
    </div>