<!--edit web-->
<form enctype="multipart/form-data" action="" method="POST">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group col-md">
        <label for="inputJudul">Judul Website</label>
        <input name="txtjudul" type="text" class="form-control" id="inputJudul" value="<?php echo $pengaturan->judul ?>">
      </div>

      <div class="form-group col-md">
        <label for="textareaAlamat">Alamat</label>
        <textarea name="txtalamat" class="form-control" id="textareaAlamat" rows="3"><?php echo $pengaturan->alamat ?></textarea>
      </div>

      <div class="form-row col-md">
        <div class="form-group col-md">
          <label for="textareaEmail">Email</label>
          <input name="txtemail" type="text" class="form-control" id="inputEmail" value="<?php echo $pengaturan->email ?>">
        </div>

        <div class="form-group col-md">
          <label for="inputTelp">Tampilan Telp</label>
          <input name="txttelp" type="text" class="form-control" id="inputTelp" value="<?php echo $pengaturan->telp ?>">
        </div>
      </div>

      <div class="form-group col-md">
        <div class="form-group">
          <label for="textareaMetadesc">Meta Deskripsi</label>
          <textarea name="txtmetadesc" class="form-control" id="textareaMetadesc" rows="3"><?php echo $pengaturan->metadesc ?></textarea>
        </div>
      </div>

      <div class="form-group col-md">
        <div class="form-group">
          <label for="textareaFb">Link Facebook</label>
          <textarea name="txtfb" class="form-control" id="textareaFb" rows="3"><?php echo $pengaturan->fb ?></textarea>
        </div>
      </div>

      <div class="form-group col-md">
        <div class="form-group">
          <label for="textareaIg">Link Instagram</label>
          <textarea name="txtig" class="form-control" id="textareaIg" rows="3"><?php echo $pengaturan->ig ?></textarea>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-row col-md">
        <div class="form-group col-md">
          <div class="card" style="width: 16rem;">
            <div class="card-header">
              Favicon (harus diisi ulang)
            </div>
            <img src="<?php echo base_url('assets/frontend/img/' . $pengaturan->favicon) ?>" class="card-img" alt="...">
            <div class="card-body">
              <label for="fileFaviconlama">File Lama</label>
              <input class="form-control" type="text" id="fileFaviconlama" value="<?php echo $pengaturan->favicon ?>" readonly>
              <label for="fileFavicon" class="mt-3">File Baru</label>
              <input name="txtfavicon" type="file" class="form-control-file mt-1" id="fileFavicon" value="<?php echo $pengaturan->favicon ?>">
              <small>Nama file tanpa spasi (contoh : tiresma3dnmaxxis)</small>
            </div>
          </div>
        </div>

        <div class="form-group col-md">
          <div class="card" style="width: 16rem;">
            <div class="card-header">
              Logo (harus diisi ulang)
            </div>
            <img src="<?php echo base_url('assets/frontend/img/' . $pengaturan->logo) ?>" class="card-img" alt="...">
            <div class="card-body">
              <label for="fileLogolama">File Lama</label>
              <input class="form-control" type="text" id="fileLogolama" value="<?php echo $pengaturan->logo ?>" readonly>
              <label for="fileFavicon" class="mt-3">File Baru</label>
              <input name="txtlogo" type="file" class="form-control-file" id="fileLogo" value="<?php echo $pengaturan->logo ?>">
              <small>Nama file tanpa spasi (contoh : tiresma3dnmaxxis)</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="form-group col-md">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="checkKonfirmasi" required>
      <label class="form-check-label" for="checkKonfirmasi">
        Saya ingin mengubah data website
      </label>
    </div>
  </div>

  <button name="btnsimpan" type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin?')">Simpan</button>
</form>