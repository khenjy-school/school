<table class="table-sm table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Id Pengaduan</th>
            <th>Tanggal Pengaduan</th>
            <th>Nik</th>
            <th>Isi Laporan</th>
            <th>Foto</th>
            <th>Status</th>
            <th>Fungsi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pengaduan as $s) { ?>
            <tr>
                <td class="text-break small" width="10%">
                    <?php echo $s->id_pengaduan ?>
                </td>
                <td class="text-break small" width="5%">
                    <?php echo $s->tgl_pengaduan ?>
                </td>
                <td class="text-break small" width="10%">
                    <?php echo $s->nik ?>
                </td>
                <td class="text-break small" width="40%">
                    <?php echo $s->isi_laporan ?>
                </td>
                <td class="text-break small" width="10%">
                    <img src="<?php echo base_url('/upload/pengaduan/' . $s->foto) ?>" width="64" />
                </td>
                <td class="text-break small" width="10%">
                    <?php echo $s->status ?>
                </td>
                <td class="" width="15%">
                    <a class="btn btn-warning text-white my-2 col-lg-auto" href="<?php echo site_url('main/edit_pengaduan/' . $s->id_pengaduan) ?>"><i class="bi-pencil-square"></i></a>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>