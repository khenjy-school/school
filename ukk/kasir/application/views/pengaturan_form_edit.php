<div class="row">
    <div class="col-12">
        <form action="<?= site_url("pengaturan/update"); ?>" method="post" enctype="multipart/form-data">
            <?php foreach ($pengaturan as $p) : ?>
                <div class="form-group">
                    <label>Judul Website</label>
                    <input type="text" class="form-control" name="judul" value="<?= $p->judul; ?>">
                    <input type="hidden" name="id" value="<?= $p->id; ?>">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?= $p->alamat; ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="<?= $p->email; ?>">
                </div>
                <div class="form-group">
                    <label>Telp</label>
                    <input type="text" class="form-control" name="telp" value="<?= $p->telp; ?>">
                </div>
                <div class="form-group">
                    <label>Fb</label>
                    <input type="text" class="form-control" name="fb" value="<?= $p->fb; ?>">
                </div>
                <div class="form-group">
                    <label>Ig</label>
                    <input type="text" class="form-control" name="ig" value="<?= $p->ig; ?>">
                </div>
                <div class="form-group">
                    <label>Metadesc</label><br>
                    <textarea name="metadesc" id="" cols="90" rows="3"><?= $p->metadesc; ?></textarea>
                </div>
                <div class="row pt-3 pb-2">
                    <div class="col-12"><img src="assets/upload/<?= $p->favicon; ?>" height="100"></div>
                </div>
                <div class="form-group">
                    <label>Favicon</label>
                    <input type="file" class="form-control-file" name="favicon">
                    <input type="hidden" name="txtfavicon" value="<?= $p->favicon; ?>">
                </div>
                <div class="row pt-3 pb-2">
                    <div class="col-12"><img src="assets/upload/<?= $p->logo; ?>" height="100"></div>
                </div>
                <div class="form-group">
                    <label>Logo</label>
                    <input type="file" class="form-control-file" name="logo">
                    <input type="hidden" name="txtlogo" value="<?= $p->logo; ?>">
                </div>
            <?php endforeach; ?>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>