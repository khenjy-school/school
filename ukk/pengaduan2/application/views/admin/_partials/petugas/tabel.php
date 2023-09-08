<table class="table table-sm table-hover" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Id Petugas</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>Telp</th>
            <th>Level</th>
            <th>Fungsi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($petugas as $s) { ?>
            <tr>
                <td class="text-break small" width="10%">
                    <?php echo $s->id_petugas ?>
                </td>
                <td class="text-break small" width="20%">
                    <?php echo $s->nama_petugas ?>
                </td>
                <td class="text-break small" width="15%">
                    <?php echo $s->username ?>
                </td>
                <td class="text-break small" width="20%">
                    <?php echo $s->password ?>
                </td>
                <td class="text-break small" width="10%">
                    <?php echo $s->telp ?>
                </td>
                <td class="text-break small" width="5%">
                    <?php echo $s->level ?>
                </td>
                <td class="" width="12%">
                    <a class="btn btn-warning text-white my-2 col-lg-auto" href="<?php echo site_url('petugas/edit/' . $s->id_petugas) ?>"><i class="bi-pencil-square"></i></a>

                    <a class="btn btn-danger text-white my-2 col-lg-auto" href="<?php echo site_url('petugas/delete/' . $s->id_petugas) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="bi-trash"></i></a>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>