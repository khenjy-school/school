<div class="main">
        <div class="head">
            <a href="<?= base_url('index.php/Controller/tr_m') ?>"><span class="fas fa-arrow-left"></span></a>
            <h4>Input Transaksi</h4>
        </div>
        <div class="form">  
            <?php echo form_open_multipart('Controller/input_trm');?>
                <select class="select" name="produk" required>                    
                    <option value="">-- Produk --</option>
                    <?php $produk = $this->CRUD->data2('produk')->result();
                    foreach($produk as $p){ ?>
                    <option value="<?= $p->id_p?>"><?= $p->nama_produk ?></option>
                    <?php } ?>
                </select>
                <input type="date" class="input" name="tanggal" required>
                <input type="number" placeholder="qty" class="input" name="jumlah">
                <input type="text" placeholder="Keterangan transaksi" class="input" name="ket">

                <button type="submit" class="submit bg-success">Submit</button>
                <button type="reset" class="reset bg-danger">Reset</button>
            <?php echo form_close();?>
        </div>
    </div>