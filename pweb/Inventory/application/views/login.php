<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
    <title>Login Page</title>
</head>
<body>
                <?php if(isset($pesan)){
                    echo $pesan;
                }
                ?>
    <div class="container">
        <h1>Log in</h1>
        <form action="<?= base_url('index.php/Login/aksi_login');?>" method="POST">
            <input type="text" name="username" placeholder="Your Username" required>
            <input type="password" name="password" placeholder="Your Password" required>
            <button type="submit">Submit</button>

        </form>
    </div>
</body>
<script>
    var closebtns = document.getElementsByClassName("close");
    var i;

for (i = 0; i < closebtns.length; i++) {
  closebtns[i].addEventListener("click", function() {
    this.parentElement.style.display = 'none';
  });
}
</script>
</html>