<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="home/img/favicon.png" type="image/png" />
  <title>gameRT ecommerce</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="home/css/bootstrap.css" />
  <link rel="stylesheet" href="home/vendors/linericon/style.css" />
  <link rel="stylesheet" href="home/css/font-awesome.min.css" />
  <link rel="stylesheet" href="home/css/themify-icons.css" />
  <link rel="stylesheet" href="home/css/flaticon.css" />
  <link rel="stylesheet" href="home/vendors/owl-carousel/owl.carousel.min.css" />
  <link rel="stylesheet" href="home/vendors/lightbox/simpleLightbox.css" />
  <link rel="stylesheet" href="home/vendors/nice-select/css/nice-select.css" />
  <link rel="stylesheet" href="home/vendors/animate-css/animate.css" />
  <link rel="stylesheet" href="home/vendors/jquery-ui/jquery-ui.css" />
  <!-- main css -->
  <link rel="stylesheet" href="home/css/style.css" />
  <link rel="stylesheet" href="home/css/responsive.css" />
</head>

<body>
  <!--================Header Menu Area =================-->
 @include('home.header')
  <!--================Header Menu Area =================-->
  <!--================Home Banner Area =================-->
  @include('home.banner')
  <!--================End Home Banner Area =================--> 
  <!-- Start feature Area -->
  @include('home.feature')

  <!-- End feature Area -->

  <!--================ Feature Product Area =================-->
  @include('home.productFeature')
  <!--================ End Feature Product Area =================-->

  <!--================ Offer Area =================-->
  @include('home.offer')

  <!--================ End Offer Area =================-->

  <!--================ New Product Area =================-->
  @include('home.productNew')

  <!--================ End New Product Area =================-->

  <!--================ Inspired Product Area =================-->
  @include('home.productInspired')

  <!--================ End Inspired Product Area =================-->

  <!--================ Start Blog Area =================-->
  @include('home.blog')

  <!--================ End Blog Area =================-->

  <!--================ start footer Area  =================-->
  @include('home.footer')

  <!--================ End footer Area  =================-->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/stellar.js"></script>
  <script src="vendors/lightbox/simpleLightbox.min.js"></script>
  <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
  <script src="vendors/isotope/isotope-min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
  <script src="vendors/counter-up/jquery.counterup.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/theme.js"></script>
</body>

</html>