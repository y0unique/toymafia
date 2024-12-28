        <section class="bg-home" style="background-image:url('admin/images/carousel/1.jpg')" id="home">
            <div class="bg-overlay"></div>
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="title-heading text-center mt-5 pt-4">
                                    <!--start carousel-->
                                    <div id="carouselControls" class="carousel slide carousel-fade" data-ride="carousel">
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="admin/images/carousel/1.jpg" alt="First slide" style="border-radius: 10px;">
                                            </div><!--end carousel item-->

                                            <?php
                                                while($row = mysqli_fetch_array($carousel1)){
                                            ?>
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" src="admin/images/carousel/<?php echo $row['name']; ?>" alt="Next slide" style="border-radius: 10px;">
                                                </div><!--end carousel item-->
                                            <?php
                                                }
                                            ?>
                                        </div><!--end carousel inner-->

                                        <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div><!--end carousel-->
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end container--> 
                </div><!--end home desc center-->
            </div><!--end home center-->
        </section><!--end section-->