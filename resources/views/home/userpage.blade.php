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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
.single-product .product-img .p_icon{
    padding:7px 0px !important;
}
.navbar {
    position: relative; /* Ensure the navbar is positioned */
    z-index: 1000; /* Higher z-index for the navbar */
}

.dropdown-menu {
    position: absolute !important; /* Dropdown should be absolute */
    z-index: 1050; /* Ensure it's above other elements */
    display: none ; /* Hide by default */
}

.dropdown.show .dropdown-menu {
    display: block !important; /* Show the dropdown when active */
}
  </style>
</head>

<body>
  <!--================Header Menu Area =================-->
 @include('home.header')
 @if(session()->has('message'))
                <div class="alert alert-success">
                    <button types='button' class='close' data-dismiss="alert" aria-hidden="true">x</button>
                  {{session()->get('message')}}  
                </div>
                @endif
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

  <!--================ Inspired Product Area =================-->
  @include('home.productInspired')

  <!--================ End Inspired Product Area =================-->

  <!--================ Latest Product Area =================-->
  @include('home.productLatest')

  <!--================ End Latest Product Area =================-->

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