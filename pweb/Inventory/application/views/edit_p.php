<div class="main">
        <div class="head">
            <a href="<?= base_url('index.php/Controller/dt_p') ?>"><span class="fas fa-arrow-left"></span></a>
            <h4>Edit Data</h4>
        </div>
        <div class="form">  
        <?php foreach($produk as $p){?>
            <?php echo form_open_multipart('Controller/proses_edit');?>
                <input type="text" class="input" name="nama_produk" value="<?= $p->nama_produk?>">
                <select name="kategori" class="select">
                    <option value="<?= $p->id_kat?>"></option>
                    <?php $kategori = $this->CRUD->data2('kategori')->result();
                    foreach($kategori as $k) { ?>
                    <option value="<?= $k->id_kat?>"<?php echo($k->id_kat==$p->id_kat)?'selected="selected"':''?>>
                    <?= $k->kategori ?></option>
                    <?php } ?>
                </select>
                <select class="select" name="merek" >
                    <option value="<?= $p->id_m?>"></option>
                    <?php $merek = $this->CRUD->data2('merek')->result();
                    foreach($merek as $m){ ?>
                    <option value="<?= $m->id_m?>"<?php echo($m->id_m==$p->id_m)?'selected="selected"':''?>>
                    <?= $m->merek ?></option>
                    <?php } ?>
                </select>
                <input type="number" class="input" name="jumlah" value="<?= $p->stok?>">
                <input type="file" name="img" class="img">
                <img src="<?= base_url()?>img/<?= $p->img; ?>" width="100px" height="100px">
                <input type="hidden" name="id" value="<?= $p->id_p; ?>"><br>

                <button type="submit" class="submit bg-success">Submit</button>
                <button type="reset" class="reset bg-danger">Reset</button>
            <?php echo form_close();?>
            <?php } ?>
        </div>
    </div>