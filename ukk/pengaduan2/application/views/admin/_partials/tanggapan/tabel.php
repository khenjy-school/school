<table class="table table-sm table-hover" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Id Tanggapan</th>
            <th>Id Pengaduan</th>
            <th>Tanggal Tanggapan</th>
            <th>Tanggapan</th>
            <th>Id Petugas</th>
            <th>Fungsi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tanggapan as $s) { ?>
            <tr>
                <td class="text-break small" width="10%">
                    <?php echo $s->id_tanggapan ?>
                </td>
                <td class="text-break small" width="10%">
                    <?php echo $s->id_pengaduan ?>
                </td>
                <td class="text-break small" width="5%">
                    <?php echo $s->tgl_tanggapan ?>
                </td>
                <td class="text-break small" width="40%">
                    <?php echo $s->tanggapan ?>
                </td>
                <td class="text-break small" width="10%">
                    <?php echo $s->id_petugas ?>
                </td>
                <td class="" width="12%">
                    <a class="btn btn-warning text-white my-2 col-lg-auto" href="<?php echo site_url('tanggapan/edit/' . $s->id_tanggapan) ?>"><i class="bi-pencil-square"></i></a>

                    <a class="btn btn-danger text-white my-2 col-lg-auto" href="<?php echo site_url('tanggapan/delete/' . $s->id_tanggapan) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="bi-trash" role="button"></i></a>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>