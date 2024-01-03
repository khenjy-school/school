<!-- halaman print untuk pembayaran -->

<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body>

  <!-- border garis putus-putus -->
  <div class="container" style="border-style: dashed;">
    <?php foreach ($tabel7 as $tl7) : ?>
      <h1 class="text-center"><?= $title ?><?= $phase ?></h1>
      <p class="text-center"><?= $tl7->nama; ?> | <?= $tl7->hp; ?> | <?= $tl7->email; ?></p>
      <p class="text-center"><?= $tl7->alamat; ?></p>
    <?php endforeach; ?>

    <!-- menampilkan data pembayaran sebagai ps -->

    <!-- menampilkan data pemesan -->
    <table class="table">
      <thead class="thead">
        <tr>
          <th><?= $tabel9_field1_alias ?></th>
          <th><?= $tabel9_field2_alias ?></th>
          <th><?= $tabel9_field3_alias ?></th>
          <th><?= $tabel9_field4_alias ?></th>
          <th><?= $tabel9_field5_alias ?></th>
          <th><?= $tabel9_field6_alias ?></th>
          <th><?= $tabel9_field7_alias ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tabel9 as $tl9) : ?>
          <tr>
            <td width="10%"><?= $tl9->nisn; ?></td>
            <td width="10%"><?= $tl9->nis ?></td>
            <td width="20%"><?= $tl9->nama ?></td>
            <td width="10%"><?= $tl9->id_kelas ?></td>
            <td width="30%"><?= $tl9->alamat ?></td>
            <td width="10%"><?= $tl9->no_telp ?></td>
            <td width="10%"><?= $tl9->id_spp ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>

  </div>

  <script src="jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="fontawesome/js/all.js"></script>

  <script>
    window.print();
  </script>
</body>

</html>