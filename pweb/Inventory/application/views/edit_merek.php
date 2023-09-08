<div class="main">
        <div class="head">
            <a href="<?= base_url('index.php/Controller/merek') ?>"><span class="fas fa-arrow-left"></span></a>
            <h4>Edit Merek</h4>
        </div>
        <div class="form">  
            <?php foreach($merek as $m) {?>
            <?php echo form_open_multipart('Controller/proses_edit_merek');?>
                <input type="text" class="input" name="merek" value="<?= $m->merek ?>">
                <input type="hidden" name="id" value="<?= $m->id_m; ?>"><br>

                <button type="submit" class="submit bg-success">Submit</button>
                <button type="reset" class="reset bg-danger">Reset</button>
            <?php echo form_close();?>
            <?php } ?>
        </div>
    </div>