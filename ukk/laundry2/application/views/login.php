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

<body class="login">
  <div class="container konten" style="margin-top: 100px;">
    <h1 class="text-center">Login</h1>

    <input type="email" name="email" placeholder="Masukkan email">
    <input type="password" name="password" placeholder="Masukkan password">
    <button class="btn btn-primary" type="submit">Login</button>

    <a class="text-center" href="#">Lupa password</a>
    <a class="text-center" href="#">Sudah punya akun?</a>
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