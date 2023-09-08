<div class="main">
        <div class="head">
            <a href="<?= base_url('index.php/Controller/dt_p') ?>"><span class="fas fa-arrow-left"></span></a>
            <h4>Input Data</h4>
        </div>
        <div class="form">  
            <?php echo form_open_multipart('Controller/input_produk');?>
                <input type="text" placeholder="Nama Produk" class="input" name="nama_produk" required>
                <select class="select" name="kategori" required>                    
                    <option value="">-- Kategori --</option>
                    <?php $kategori = $this->CRUD->data2('kategori')->result();
                    foreach($kategori as $k){ ?>
                    <option value="<?= $k->id_kat?>"><?= $k->kategori ?></option>
                    <?php } ?>
                </select>
                <select class="select" name="merek" required>                    
                    <option value="">-- Merek --</option>
                    <?php $merek = $this->CRUD->data2('merek')->result();
                    foreach($merek as $m){ ?>
                    <option value="<?= $m->id_m?>"><?= $m->merek ?></option>
                    <?php } ?>
                </select>
                <input type="number" placeholder="qty" class="input" name="jumlah" required>
                <input type="file" name="img" class="img">


                <button type="submit" class="submit bg-success">Submit</button>
                <button type="reset" class="reset bg-danger">Reset</button>
            <?php echo form_close();?>
        </div>
    </div>