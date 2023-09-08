<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Validation</title>
</head>

<body>
  <?php echo validation_errors(); ?>

  <div style="margin: auto; max-width: 400px;">
    Contoh Form Validation
    

    <?= form_open('latihan/formulir'); ?>
      <p>Nama</p>
      <input type="text" name="name" value="" size="70">

      <p>Kode pos</p>
      <input type="text" name="kodepos" value="" size="70">

      <p>Alamat Email</p>
      <input type="email" name="email" value="" size="70">

      <div><input type="submit" value="submit"></div>
    </form>
  </div>
</body>

</html>