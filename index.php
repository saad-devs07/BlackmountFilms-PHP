<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Blackmount Films - Home</title>
    <link rel="shortcut icon" href="assets/img/favicon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&amp;display=swap">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/plugins.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/clients.css" />
</head>
<body>

    <!-- Navbar -->   
    <?php include "navbar.php"; ?>

    <!-- Slider -->
    <header id="slider-area" class="header slider-fade">
        <div class="ruby-container">
            <div class="owl-carousel owl-theme">
                <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
                <div class="text-left item bg-img" data-overlay-dark="2" data-background="assets/img/slider/1.jpg">
                    <div class="v-middle caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Welcome to our</h4>
                                    <h2 class="mt-3">Blackmount Films</h2>
                                    <p>We love to pause the wild, happy and real moments of life, just to hear their stories untold.</p> 
                                    <!-- <a href="#" class="button-primary">My works</a> -->
                                    <a href="#" class="button-tersiyer">Contact me</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-left item bg-img" data-overlay-dark="2" data-background="assets/img/slider/2.jpg">
                    <div class="v-middle caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Hello there !</h4>
                                    <h2 class="mt-3">Blackmount Films</h2>
                                    <p>We're professional photographers, creating dreamscapes with black, white and shades in-between.</p> 
                                     
                                    <a href="#" class="button-tersiyer">Customize Package Plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About section -->
    <section class="about section-padding">
        <div class="container">
            <div class="row ">

                <div class="col-md-5 mb-30 animate-box" data-animate-effect="fadeInUp">
                    <h2 class="section-title mb-5">Blackmount Films</h2>
                    <p>Quisque sed tellus lorem. Nullam bibena tortor seman marine porta felis the porta dignissim pretium.</p>
                    <p class="mb-30">Vivamus tortor risus, pharetra ut venenatis ac, rutrum eget ante. Fusce convallis nibh felis, eget hendrerit diam rhoncus eget. Donec dictum lacus eleifend nisl efficitur venenatis.</p>

                    <ul class="list-unstyled about-list mb-30">
                        <li>
                            <div class="about-list-icon"> <span class="ti-check"></span> </div>
                            <div class="about-list-text">
                                <p>Over 15 years of experience</p>
                            </div>
                        </li>
                        <li>
                            <div class="about-list-icon"> <span class="ti-check"></span> </div>
                            <div class="about-list-text">
                                <p>200+ successfully executed projects</p>
                            </div>
                        </li>
                        <li>
                            <div class="about-list-icon"> <span class="ti-check"></span> </div>
                            <div class="about-list-text">
                                <p>Exceptional work quality</p>
                            </div>
                        </li>
                    </ul>

                </div>

                <div class="col-md-5 offset-md-1">
                    <div class="about-img">
                        <div class="img"> <img src="assets/img/about.jpg" class="img-fluid" alt=""> </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Services section -->
    <section class="services section-padding bg-blck">
        <div class="container">
            <div class="row">

                <?php
                    include "config.php";
                    $fetchallcategories = mysqli_query($connect, "SELECT * FROM categories");
                    while ($fetchcategory = mysqli_fetch_assoc($fetchallcategories)) {
                ?>
                    <div class="col-md-4 border-01">
                        <div class="item"> 
                            <a href="gallery.php?photography">
                                <img src="cPanel/web_images/categories/<?php echo $fetchcategory['image']; ?>" alt="">
                                <h5><?php echo $fetchcategory['name']; ?></h5>
                                <p><?php echo $fetchcategory['cat_desc']; ?></p>
                            </a>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>

    <!-- Latest Packages -->
    <section class="blog section-padding">
        <div class="container">

            <div class="row">
                <div class="col-md-5 mb-30">
                    <h2 class="section-title">Latest Packages</h2>
                    <hr class="border-2">
                    <p class="section-title2">Quisque sed tellus nullam biben the volutpat dignissim pretium.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 owl-carousel owl-theme">
            <?php
                include "config.php";
                $fetchallpkgs = mysqli_query($connect, "SELECT * FROM latest_pkgs");
                while($latest_pkgs = mysqli_fetch_assoc($fetchallpkgs)){
            ?>

                <div class="news">
                    <figure>
                        <img src="cPanel/web_images/latest_pkgs/<?php echo $latest_pkgs['Pkg_Image']; ?>" alt="Package Picture" class="img-fluid mt-3">
                    </figure>
                    <div class="caption">
                        <h6><?php echo $latest_pkgs['Pkg_Name']; ?></h6>
                            <ul class="list-unstyled about-list">
                                <li>
                                    <div class="about-list-icon"><span class="ti-check"></span></div>
                                    <div class="about-list-text">
                                    <p><?php echo $latest_pkgs['d1']; ?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="about-list-icon"><span class="ti-check"></span></div>
                                    <div class="about-list-text">
                                    <p><?php echo $latest_pkgs['d2']; ?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="about-list-icon"><span class="ti-check"></span></div>
                                    <div class="about-list-text">
                                    <p><?php echo $latest_pkgs['d3']; ?></p>
                                    </div>
                                </li>
                                <li>                               
                                    <div class="about-list-icon"><span class="ti-check"></span></div>
                                    <div class="about-list-text">
                                    <p><?php echo $latest_pkgs['d4']; ?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="about-list-icon"><span class="ti-check"></span></div>
                                    <div class="about-list-text">
                                    <p><?php echo $latest_pkgs['d5']; ?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="about-list-icon"><span class="ti-check"></span></div>
                                    <div class="about-list-text">
                                    <p><?php echo $latest_pkgs['d6']; ?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="about-list-icon"><span class="ti-check"></span></div>
                                    <div class="about-list-text">
                                    <p><?php echo $latest_pkgs['d7']; ?></p>
                                    </div>
                                </li>
                                <li>                                
                                    <div class="about-list-icon"><span class="ti-check"></span></div>
                                    <div class="about-list-text">
                                    <p><?php echo $latest_pkgs['d8']; ?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="about-list-icon"><span class="ti-check"></span></div>
                                    <div class="about-list-text">
                                    <p><?php echo $latest_pkgs['d9']; ?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="about-list-icon"><span class="ti-check"></span></div>
                                    <div class="about-list-text">
                                    <p><?php echo $latest_pkgs['d10']; ?></p>
                                    </div>
                                </li>
                            </ul>
                            <hr class="border-2">
                        <div class="info-wrapper">
                            <div class="more"><a href="#" class="link-btn" tabindex="0">Book Event</a></div>
                            <div class="date">Valid till <?php echo $latest_pkgs['valid_date']; ?></div>
                        </div>
                    </div>
                </div>                
            <?php } ?>
                </div>
            </div>
        </div>
    </section>    

    <!-- Clients section -->
    <div class="container">
        <h2 class="section-title">Our Clients</h2>
        <hr class="border-2">
        <p class="section-title2">Quisque sed tellus nullam biben the volutpat dignissim pretium.</p>

        

       <section class="customer-logos slider">
       <?php 
            include "config.php";
            $fetchallclients = mysqli_query($connect, "SELECT * FROM clients");
            while($fetchclient = mysqli_fetch_assoc($fetchallclients)){
        ?>

            <div class="slide">
                <img src="cPanel/web_images/clients/<?php echo $fetchclient['Image']; ?>">
            </div>
        
       <?php } ?>
       </section>

       <br><br>
    </div>

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
    <script src="assets/js/clients.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>