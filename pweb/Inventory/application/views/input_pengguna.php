<div class="main">
        <div class="head">
            <a href="<?= base_url('index.php/Controller/users') ?>"><span class="fas fa-arrow-left"></span></a>
            <h4>Input User</h4>
        </div>
        <div class="form">  
            <?php echo form_open_multipart('Controller/input_u');?>
                <input type="text" placeholder="Nama Lengkap" class="input" name="nama" required>
                
                <input type="text" placeholder="Username" class="input" name="username" required>

                <input type="text" placeholder="Alamat" class="input" name="alamat" required>

                <input type="text" placeholder="Telepon" class="input" name="telp" required>

                <input type="password" placeholder="password" class="input" name="password" required>

                <h5 class="level">Level
                <input type="radio" class="radio" name="level" value="admin">Admin
                <input type="radio" class="radio2" name="level" value="member">Member</h5>

                <input type="file" name="img" class="img">

                <button type="submit" class="submit bg-success">Submit</button>
                <button type="reset" class="reset bg-danger">Reset</button>
            <?php echo form_close();?>
        </div>
    </div>