<table>
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Paket</th>
      <th>Harga</th>
      <th>Deskripsi</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; ?>
    <?php foreach ($paket as $p) : ?>
      <tr>
        <td><?= $no; ?></td>
        <td><?= $p['nama_paket']; ?></td>
        <td><?= $p['harga']; ?></td>
        <td><?= $p['deskripsi']; ?></td>
        <td><img src="<?= base_url('assets/img/paket/') . $p['gambar']; ?>" alt=""></td>
        <td>
          <a href="<?= base_url('admin/paket/edit/') . $p['id_paket']; ?>" class="badge badge-success">Edit</a>
          <a href="<?= base_url('admin/paket/hapus/') . $p['id_paket']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<!-- make me a sidebar -->