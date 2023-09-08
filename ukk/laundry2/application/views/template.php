<base href="<?= base_url('assets/') ?>">
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <link rel="stylesheet" href="datatables/datatables/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="css/style.css">

  <title>Website Laundry</title>
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand">MyLaundry</a>
    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="my-nav" class="collapse navbar-collapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Pesan <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Tentang</a>
        </li>
      </ul>
      <form class="form-inline" action="" method="get">
        <inc:\Users\khenj\Desktop\laundry.lnkput class="form-control mr-sm-2" type="text" name="cari" style="width: 70%;">
        <button class="btn btn-primary">Cari</button>
      </form>
    </div>
  </nav>

  <div class="container konten" style="margin-top: 100px;">
    <img class="img-fluid rounded" src="img/laundry.jpg">
    <h1 class="text-center">Selamat Datang di MyLaundry</h1>

    <div class="row">
      <div class="col-6">
        Di sini kami melayani laundry dari berbagai jenis kain dan ukuran. Kami siap melayani keinginan Anda untuk hidup tenang tanpa diganggu oleh baju-baju yang masih kotor. Cukup di MyLaundry Anda dapat menikmati layanan yang sangat simpel cukup dengan menekan beberapa tombol tanpa perlu mengisi data di kertas form yang merepotkan.
      </div>
      <div class="col-6">
        <img src="img/wish.png" style="width: 100%;">
      </div>
    </div>
  </div>

  <!-- javascript untuk semua halaman (sesuai kebutuhan) -->
  <script src="jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="fontawesome/js/all.min.js"></script>
  <script src="popper.min.js"></script>

  <!-- javascript untuk datatables bertema bootstrap -->
  <script src="datatables/datatables/js/jquery.dataTables.min.js"></script>
  <script src="datatables/datatables/js/dataTables.bootstrap4.min.js"></script>

  <!-- fungsi datatables (wajib ada) -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#data').DataTable();

    });
  </script>
</body>

</html>