<!doctype html>
<html lang="en">

<body>
    <div class="container-fluid">
        <div class="row">

            <?php $this->load->view('admin/_partials/sidebar'); ?>
            <main role="main" class="col-md px-md-4">
                <div class="row">
                    <div class="col-md pt-md-4 my-3 border-bottom">
                        <div class="row">
                            <div class="col-auto my-auto">
                                <span class="h1"><?php echo $header1; ?></span>
                            </div>
                            <div class="col-auto my-auto">
                                <a class="btn btn-success" href="<?php echo site_url('masyarakat/tambah'); ?>">TAMBAH +</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('admin/_partials/masyarakat/data') ?>
                <div class="row">
                    <div class="col my-3" style="max-height:300px; overflow:auto;">
                        <?php $this->load->view('admin/_partials/masyarakat/tabel') ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col my-3 border-bottom">

                    </div>
                </div>

                <?php $this->load->view('admin/_partials/footer'); ?>
            </main>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


</body>

</html>