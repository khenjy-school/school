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
                <td class="text-break small" width="11%">
                    <?php echo $s->nik ?>
                </td>
                <td class="text-break small" width="40%">
                    <?php echo $s->isi_laporan ?>
                </td>
                <td class="text-break small" width="10%">
                    <img src="<?php echo base_url('/upload/pengaduan/' . $s->foto) ?>" width="64" />
                </td>
                <td class="text-break small" width="6%">
                    <?php echo $s->status ?>
                </td>
                <td class="" width="8%">
                    <a class="btn btn-success text-white my-2 col-lg-auto" href="<?php echo site_url('tanggapan/tambah/' . $s->id_pengaduan) ?>" onclick="return confirm('Apakah anda yakin ingin memilih data dengan id <?php echo $s->id_pengaduan; ?>?')">PILIH</a>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>