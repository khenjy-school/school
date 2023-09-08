<div class="main">
        <div class="head">
            <a href="<?= base_url('index.php/Controller/users') ?>"><span class="fas fa-arrow-left"></span></a>
            <h4>Edit User</h4>
        </div>
        <div class="form">  
            <?php foreach($user as $u) {?>
            <?php echo form_open_multipart('Controller/proses_edit_user');?>
                <input type="text" class="input" name="nama" value="<?= $u->nama ?>">
                <input type="text" class="input" name="username" value="<?= $u->username ?>">
                <input type="text" class="input" name="telp" value="<?= $u->no_telp ?>">
                <input type="text" class="input" name="alamat" value="<?= $u->alamat ?>">
                <input type="password" class="input" name="password" value="<?= $u->password ?>">
                <input type="file" name="img" class="img">
                <img src="<?= base_url()?>img/user/<?= $u->img; ?>" width="100px" height="100px">
                <input type="hidden" name="id" value="<?= $u->id; ?>"><br>

                <button type="submit" class="submit bg-success">Submit</button>
                <button type="reset" class="reset bg-danger">Reset</button>
            <?php echo form_close();?>
            <?php } ?>
        </div>
    </div>