<div class="main">
        <div class="head">
            <a href="<?= base_url('index.php/Controller/tr_m') ?>"><span class="fas fa-arrow-left"></span></a>
            <h4>Edit Transaksi</h4>
        </div>
        <div class="form">
        <?php foreach($trm as $m){?>
            <?php echo form_open_multipart('Controller/proses_edit_trm');?>
                <select class="select" name="produk">
                <option value="<?= $m->id_p?>"></option>
                    <?php $produk = $this->CRUD->data2('produk')->result();
                    foreach($produk as $p) { ?>
                    <option value="<?= $p->id_p?>"<?php echo($p->id_p==$m->id_p)?'selected="selected"':''?>>
                    <?= $p->nama_produk ?></option>
                    <?php } ?>
                </select>
                <input type="date" class="input" name="tanggal" value="<?= $m->tanggal?>">
                <input type="number" class="input" name="jumlah" value="<?= $m->jumlah_barang?>">
                <input type="text" class="input" name="ket" value="<?= $m->keterangan?>">
                <input type="hidden" name="id" value="<?= $m->id; ?>"><br>

                <button type="submit" class="submit bg-success">Submit</button>
                <button type="reset" class="reset bg-danger">Reset</button>
            <?php echo form_close();?>
            <?php } ?>
        </div>
    </div>