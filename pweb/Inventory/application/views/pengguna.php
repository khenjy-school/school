<div class="main">
<?= $this->session->flashdata('message');?>
    <div class="sect">
        <h4>Pengguna</h4>
        <a href="<?= base_url('index.php/Controller/v_input6') ?>">Tambah Data <span class="fas fa-plus"></span></a>
    </div>
    <table>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Level</th>
            <th>Image</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($pengguna as $p) {?>
        <tr>
            <td headers="No."><?= ++$start ?>.</td>
            <td headers="Nama"><?= $p->nama ?></td>
            <td headers="Username"><?= $p->username ?></td>
            <td headers="Level"><?= $p->level ?></td>
            <td headers="Image"><img src="<?= base_url().'img/user/'.$p->img?>"></td>
            <td headers="Aksi">
                <a href="<?= base_url().'index.php/Controller/edit_u/'.$p->id?>"><i class="fas fa-pen edit"></i></a>
                <a href="<?= base_url().'index.php/Controller/show/'.$p->id?>"><i class="fas fa-user edit"></i></a>
                <a href="<?= base_url().'index.php/Controller/delete_u/'.$p->id?>" onclick="return confirm('apakah yakin akan menghapus data ini??')"><i class="fas fa-times delete"></i></a>
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