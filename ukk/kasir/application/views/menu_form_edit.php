<div class="row">
    <div class="col-12">
        <form action="<?= site_url("menu/update"); ?>" method="post" enctype="multipart/form-data">
        <?php foreach($menu as $m): ?>
        <div class="form-group">
            <label>Nama Menu</label>
            <input type="text" class="form-control" name="nama" value="<?= $m->nama; ?>">
            <input type="hidden" name="kode" value="<?= $m->id_menu; ?>">
        </div>
        <div class="form-group">
            <label>Harga Menu</label>
            <input type="text" class="form-control" name="harga" value="<?= $m->harga_jual; ?>">
        </div>
        <div class="form-group">
            <label>Kategori Menu</label>
            <?= $m->kategori; ?>
            <select class="form-control" name="kategori">
                <option value="makanan" <?= ($m->kategori == "makanan")? "selected":""; ?> >Makanan</option>
                <option value="minuman" <?= ($m->kategori == "minuman")? "selected":""; ?> >Minuman</option>
            </select>
        </div>
        <div class="row pt-3 pb-2">
            <div class="col-12"><img src="assets/upload/<?= $m->gambar; ?>" height="100"></div>
        </div>
        <div class="form-group">
            <label>Gambar Menu</label>
            <input type="file" class="form-control" name="gambar">
            <input type="hidden" name="txtgambar" value="<?= $m->gambar; ?>">
        </div>
        <?php endforeach; ?>
        <div class="form-group">
            <button type="submit">Simpan</button>
        </div>
        </form>
    </div>
</div>