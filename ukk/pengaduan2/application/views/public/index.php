<!DOCTYPE html>
<html lang="en">

<body>
    <div class="container-fluid">
        <base href="<?php echo base_url(); ?>">

        <!--Carousel-->
        <div class="container-fluid">
            <div class="row">
                <div class="col"></div>

                <div class="col-9" style="padding-left: 0; padding-right: 0;">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" style="width: 10%; height: 10px; margin-right: 10px;"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1" style="width: 10%; height: 10px;"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2" style="width: 10%; height: 10px; margin-left: 10px;"></li>
                        </ol>
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <img class="d-block w-100" src="assets/images/headline/slider/F1.png" alt="First slide" style="height: 400px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/images/headline/slider/F3.png" alt="Second slide" style="height: 400px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/images/headline/slider/F4.png" alt="Third slide" style="height: 400px;">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon carcon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <div class="col"></div>
            </div>
        </div>
    </div>
    <?php $this->load->view('public/_partials/footer'); ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
</body>

</html>