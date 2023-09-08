<div class="main">
    <div class="container-sm">
        <?php foreach($user as $u) {?>
            <div class="d-flex justify-content-center">
                <input type="hidden" name="id" value="<?= $u->id; ?>"><br>
                <img src="<?= base_url()?>img/user/<?= $u->img; ?>" width="100px" height="100px">
            </div><br>
            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?= $u->nama?>"><br>
            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?= $u->username?>"><br>
            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?= $u->alamat?>"><br>
            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?= $u->no_telp?>"><br>
            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?= $u->level?>"><br>
        <?php } ?>
</div>
<a href="<?= base_url('index.php/Controller/users') ?>"><span class="fas fa-arrow-left"></span></a>
</div>