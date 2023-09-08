<div class="main">
        <div class="head">
            <a href="<?= base_url('index.php/Controller/tr_k') ?>"><span class="fas fa-arrow-left"></span></a>
            <h4>Edit Transaksi</h4>
        </div>
        <div class="form">
        <?php foreach($trk as $k){?>
            <?php echo form_open_multipart('Controller/proses_edit_trk');?>
                <select class="select" name="produk">
                <option value="<?= $k->id_p?>"></option>
                    <?php $produk = $this->CRUD->data2('produk')->result();
                    foreach($produk as $p) { ?>
                    <option value="<?= $p->id_p?>"<?php echo($p->id_p==$k->id_p)?'selected="selected"':''?>>
                    <?= $p->nama_produk ?></option>
                    <?php } ?>
                </select>
                <input type="date" class="input" name="tanggal" value="<?= $k->tanggal?>">
                <input type="number" class="input" name="jumlah" value="<?= $k->jumlah_barang?>">
                <input type="text" class="input" name="ket" value="<?= $k->keterangan?>">
                <input type="hidden" name="id" value="<?= $k->id; ?>"><br>

                <button type="submit" class="submit bg-success">Submit</button>
                <button type="reset" class="reset bg-danger">Reset</button>
            <?php echo form_close();?>
            <?php } ?>
        </div>
    </div>