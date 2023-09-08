<!doctype html>
<html lang="en">

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col"></div>
            <div class="col-9" style="background-color: white; height: 215px; padding-top: 80px;">
                <div class="li"><?php echo $header1; ?></div>
                <div class="bordb1"></div>
            </div>
            <div class="col"></div>
        </div>

        <div class="row">
            <div class="col"></div>
            <div class="col-9 form1" style="background-color: white; height: auto; color:white">
                <div class="row justify-content-between">
                    <div class="col-5 bg-secondary" style="height: 500px;">
                        <h2>Masyarakat</h2>
                        <p>Anda bisa :</p>
                        <p>Memasukkan pengaduan</p>
                        <p>Melihat list pengaduan yang telah dibuat</p>
                        <p>Mengedit pengaduan</p>
                        <p>Menghapus pengaduan</p>
                        <a class="btn btn-primary" href="<?= site_url('masyarakat/login'); ?>">Login Sebagai Masyarakat</a>
                    </div>
                    <div class="col-5 bg-secondary" style="height: 500px;">
                        <h2>Petugas</h2>
                        <p>Anda bisa :</p>
                        <p>Melihat list pengaduan</p>
                        <p>Mamasukkan tanggapan</p>
                        <p>Mengedit tanggapan</p>
                        <p>Menghapus tanggapan</p>
                        <p>Melihat list tanggapan</p>
                        <a class="btn btn-danger" href="<?= site_url('petugas/login'); ?>">Login Sebagai Petugas</a>
                    </div>
                </div>

            </div>
            <div class="col"></div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


</body>

</html>