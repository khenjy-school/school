<!DOCTYPE html>
<html lang="en">

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col"></div>

            <div class="col-9" style="min-height:500px;">
                <div class="row">
                    <div class="col-md pt-md-5 mb-md-3 border-bottom">
                        <div class="row">
                            <div class="col-md-auto my-auto">
                                <span class="h1"><?php echo $header1; ?></span>
                            </div>
                            <div class="col-auto my-auto">
                                <a class="btn btn-success" href="<?php echo site_url('main/tambah_pengaduan'); ?>">TAMBAH +</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php $this->load->view('public/_partials/pengaduan/tabel'); ?>
                    </div>

                </div>

            </div>

            <div class="col"></div>
        </div>

    </div>
    <?php $this->load->view('public/_partials/footer'); ?>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
</body>

</html>