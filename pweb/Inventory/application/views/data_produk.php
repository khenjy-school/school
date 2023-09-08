<div class="main">
    <?= $this->session->flashdata('message');?>
<div class="sect">
        <h4>Data Produk</h4>
        <a href="<?= base_url('index.php/Controller/v_input') ?>" class="mb-3 mr-1">Tambah Data <span class="fas fa-plus"></span></a>
    </div>
    <table>
        <tr class="text-center">
            <th>No.</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Merek</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($produk as $p) {?>
        <tr class="text-center">
            <td headers="No."><?= ++$start ?>.</td>
            <td headers="Nama Produk"><?= $p->nama_produk ?></td>
            <td headers="Kategori"><?= $p->kategori ?></td>
            <td headers="Merek"><?= $p->merek ?></td>
            <td headers="Stok"><?= $p->stok ?></td>
            <td headers="Gambar"><img src="<?= base_url().'img/'.$p->img?>"></td>
            <td headers="Aksi">
                <a href="<?= base_url().'index.php/Controller/edit/'.$p->id_p ?>"><i class="fas fa-pen edit"></i></a>
                <a href="<?= base_url().'index.php/Controller/delete/'.$p->id_p?>" onclick="return confirm('apakah yakin akan menghapus data ini??')"><i class="fas fa-times delete"></i></a>
            </td>
        </tr>
        <?php }?>
    </table>
    <?php echo $this->pagination->create_links(); ?>
    <script>
    var closebtns = document.getElementsByClassName("close");
    var i;

for (i = 0; i < closebtns.length; i++) {
  closebtns[i].addEventListener("click", function() {
    this.parentElement.style.display = 'none';
  });
}
</script>
</div>