<table class="table table-sm table-hover" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Nik</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>Telp</th>
            <th>Fungsi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($masyarakat as $s) { ?>
            <tr>
                <td class="text-break small" width="10%">
                    <?php echo $s->nik ?>
                </td>
                <td class="text-break small" width="20%">
                    <?php echo $s->nama ?>
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
                <td class="" width="12%">
                    <a class="btn btn-warning my-2 col-lg-auto" href="<?php echo site_url('masyarakat/edit/' . $s->nik) ?>"><img src="<?php echo base_url('assets/frontend/icon/pencil-square.svg') ?>" alt=""></a>

                    <a class="btn btn-danger text-white my-2 col-lg-auto" href="<?php echo site_url('masyarakat/delete/' . $s->nik) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="bi-trash"></i></a>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>