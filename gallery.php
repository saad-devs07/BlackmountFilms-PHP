<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Blackmount Films - Gallery</title>
    <link rel="shortcut icon" href="img/favicon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&amp;display=swap">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/plugins.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
    
    <?php include "navbar.php"; ?>

    <!-- Header Banner -->
    <section class="banner-header banner-img banner-img-top section-padding valign bg-img bg-fixed banner-overlay" data-overlay-darkgray="1" data-background="assets/img/banner/1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h1>Gallery</h1>
                    <hr class="border-1">
                    <p>I am professional photographer based on New York, creating dreamscapes with black, white and shades in-between.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery -->
    <section class="section-padding bg-blck">
        <div class="container">
            
            <div class="row">
                <div class="col-md-5 text-left">
                    <h2 class="section-title"><span>My Works</span></h2>
                    <hr class="border-2">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-left">
                    <ul class="gallery-filter">
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".photography">Photography</li>
                        <li data-filter=".wedding">Wedding</li>
                        <li data-filter=".event">Event</li>
                        <li data-filter=".fashion">Fashion</li>
                        <li data-filter=".product">Product</li>
                    </ul>
                </div>
            </div>

            <div class="row gallery-items">

                <?php 
                    include "config.php";
                    $fetchallpics = mysqli_query($connect, "SELECT * FROM events_pics");
                    while($fetchPic = mysqli_fetch_assoc($fetchallpics)){
                ?>
                    <div class="col-md-4 gallery-masonry-wrapper single-item wedding">
                        <a href="cPanel/web_images/photography/<?php echo $fetchPic['image']; ?>" title="" class="gallery-masonry-item-img-link img-zoom">
                            <div class="gallery-box">
                                <div class="gallery-img"> <img src="cPanel/web_images/photography/<?php echo $fetchPic['image']; ?>" class="img-fluid mx-auto d-block" alt=""> </div>
                                <div class="gallery-masonry-item-img"></div>
                                <div class="gallery-masonry-item-content">
                                    <div class="gallery-masonry-item-category"><?php echo $fetchPic['name']; ?></div>
                                    <h4 class="gallery-masonry-item-title"><?php echo $fetchPic['photo_desc']; ?></h4>
                                </div>
                            </div>
                        </a>
                    </div>
                            
                <?php } ?>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include "footer.php"; ?>

    <!-- jQuery -->
    <script src="assets/js/jquery-3.6.3.min.js"></script>
    <script src="assets/js/jquery-migrate-3.0.0.min.js"></script>
    <script src="assets/js/modernizr-2.6.2.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/jquery.isotope.v3.0.2.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/scrollIt.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.stellar.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.js"></script>
    <script src="assets/js/YouTubePopUp.js"></script>
    <script src="assets/js/custom.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>