<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="home/img/favicon.png" type="image/png" />
  <title>RT ecommerce</title>
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
  <style>
    .inputStyle{
      border-radius: 20px;
      border: 1px solid #2d9fd9;
    width: 50px;
    border-radius: 5Opx;
    outline:none;
    color: #2a2a2a;
    border:none;
    }
    input:focus, textarea:focus, select:focus {
  outline: none;
}
  </style>
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

  <!--================ End Blog Area =================-->

  <!--================ start footer Area  =================-->
  @include('home.footer')

  <!--================ End footer Area  =================-->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="home/js/jquery-3.2.1.min.js"></script>
  <script src="home/js/popper.js"></script>
  <script src="home/js/bootstrap.min.js"></script>
  <script src="home/js/stellar.js"></script>
  <script src="home/vendors/lightbox/simpleLightbox.min.js"></script>
  <script src="home/vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="home/vendors/isotope/imagesloaded.pkgd.min.js"></script>
  <script src="home/vendors/isotope/isotope-min.js"></script>
  <script src="home/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="home/js/jquery.ajaxchimp.min.js"></script>
  <script src="home/vendors/counter-up/jquery.waypoints.min.js"></script>
  <script src="home/vendors/counter-up/jquery.counterup.js"></script>
  <script src="home/js/mail-script.js"></script>
  <script src="home/js/theme.js"></script>
</body>

</html>