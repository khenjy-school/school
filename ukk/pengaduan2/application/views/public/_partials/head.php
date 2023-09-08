    <head>
        <base href="<?php echo base_url(); ?>">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS Online -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
        <!--Bootstrap CSS Offline-->
        <!-- <link href="css/bootstrap.css" rel="stylesheet"> -->
        <!-- Custom styles for this template-->
        <link rel="stylesheet" href="<?= base_url('assets/'); ?>frontend/css/pengaduan-public.css">
        <!-- Custom styles for this template minimal version-->
        <!--<link href="<php echo base_url('assets/css/4s5s.css') ?>" rel="stylesheet">-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="icon" href="<?php echo base_url('assets/frontend/img/' . $pengaturan->favicon) ?>" type="image/gif" sizes="16x16">

        <title>
            <?php echo $title; ?> - <?php echo $pengaturan->judul; ?>
        </title>
    </head>