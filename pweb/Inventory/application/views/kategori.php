<div class="main">
<?= $this->session->flashdata('message');?>
    <div class="sect">
        <h4>Kategori</h4>
        <a href="<?= base_url('index.php/Controller/v_input2')?>">Tambah Data <span class="fas fa-plus"></span></a>
    </div>
    <table>
        <tr>
            <th>No.</th>
            <th>ID Kategori</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
        <?php $no=1; foreach ($kategori as $k) {?>
        <tr>
            <td headers="No."><?= ++$start ?></td>
            <td headers="ID Kategori"><?= $k->id_kat ?></td>
            <td headers="Kategori"><?= $k->kategori ?></td>
            <td headers="Aksi">
                <a href="<?= base_url().'index.php/Controller/edit_kat/'.$k->id_kat?>"><i class="fas fa-pen edit"></i></a>
                <a href="<?= base_url().'index.php/Controller/delete_kat/'.$k->id_kat?>" onclick="return confirm('apakah yakin akan menghapus data ini??')"><i class="fas fa-times delete"></i></a>
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