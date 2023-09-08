<div class="main">
        <div class="head">
            <a href="<?= base_url('index.php/Controller/merek') ?>"><span class="fas fa-arrow-left"></span></a>
            <h4>Input Merek</h4>
        </div>
        <div class="form">  
            <?php echo form_open_multipart('Controller/input_merek');?>
                <input type="text" placeholder="Merek" class="input" name="merek">

                <button type="submit" class="submit bg-success">Submit</button>
                <button type="reset" class="reset bg-danger">Reset</button>
            <?php echo form_close();?>
        </div>
    </div>