<div class="main">
        <div class="head">
            <a href="<?= base_url('index.php/Controller/kategori') ?>"><span class="fas fa-arrow-left"></span></a>
            <h4>Input Kategori</h4>
        </div>
        <div class="form">  
            <?php echo form_open_multipart('Controller/input_kat');?>
                <input type="text" placeholder="Kategori" class="input" name="kategori" required>

                <button type="submit" class="submit bg-success">Submit</button>
                <button type="reset" class="reset bg-danger">Reset</button>
            <?php echo form_close();?>
        </div>
    </div>