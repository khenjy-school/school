<!--edit petugas-->
<form action="" method="POST">
  <div class="col-md-3 form-group">
    <label for="id">Id Petugas</label>
    <input type="text" id="id" class="form-control" disabled name="txtidpetugas" aria-describedby="helpId" placeholder="masukkan id petugas di sini" value="<?php echo $_SESSION['id_petugas'] ?>">
  </div>

  <div class="col-md-4 form-group">
    <label for="nama_petugas">Nama</label>
    <input type="text" id="nama_petugas" class="form-control" disabled name="txtnamapetugas" aria-describedby="helpId" placeholder="masukkan nama petugas di sini" value="<?php echo $_SESSION['nama_petugas'] ?>">
  </div>

  <div class="col-md-4 form-group">
    <label for="username">Username</label>
    <input type="text" id="username" class="form-control" disabled name="txtusername" aria-describedby="helpId" placeholder="masukkan username di sini" value="<?php echo $_SESSION['username'] ?>">
  </div>

  <div class="col-md-4 form-group">
    <label for="password">Password</label>
    <input type="password" id="password" class="form-control" disabled name="txtpassword" aria-describedby="helpId" placeholder="masukkan password di sini" value="<?php echo $_SESSION['password'] ?>">
  </div>

  <div class="col-md-4 form-group">
    <label for="telp">Telp</label>
    <input type="text" id="telp" class="form-control" disabled name="txttelp" aria-describedby="helpId" placeholder="masukkan telp di sini" value="<?php echo $_SESSION['telp'] ?>">
  </div>

  <div class="col-md-4 form-group">
    <label for="level">Level</label>
    <select type="text" id="level" disabled class="form-control" name="txtlevel" aria-describedby="helpId">
      <option selected hidden><?php echo $_SESSION['level'] ?></option>
    </select>
  </div>
</form>