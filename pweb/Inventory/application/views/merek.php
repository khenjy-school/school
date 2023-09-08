<div class="main">
<?= $this->session->flashdata('message');?>
    <div class="sect">
        <h4>Merek</h4>
        <a href="<?= base_url('index.php/Controller/v_input3')?>" class="mb-3 mr-1">Tambah Data <span class="fas fa-plus"></span></a>
    </div>
    <table>
        <tr class="text-center">
            <th>No.</th>
            <th>ID Merek</th>
            <th>Merek</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($merek as $m) {?>
        <tr class="text-center">
            <td headers="No."><?= ++$start ?>.</td>
            <td headers="ID Merek"><?= $m->id_m ?></td>
            <td headers="Merek"><?= $m->merek ?></td>
            <td headers="Aksi">
                <a href="<?= base_url().'index.php/Controller/edit_merek/'.$m->id_m?>"><i class="fas fa-pen edit"></i></a>
                <a href="<?= base_url().'index.php/Controller/delete_merek/'.$m->id_m?>" onclick="return confirm('apakah yakin akan menghapus data ini??')"><i class="fas fa-times delete"></i></a>
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