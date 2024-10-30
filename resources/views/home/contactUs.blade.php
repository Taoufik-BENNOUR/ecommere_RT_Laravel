<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
     <base href="/public">
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="home/img/favicon.png" type="image/png" />
    <title>Eiser ecommerce</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="home/css/bootstrap.css" />
    <link rel="stylesheet" href="home/vendors/linericon/style.css" />
    <link rel="stylesheet" href="home/css/font-awesome.min.css" />
    <link rel="stylesheet" href="home/css/themify-icons.css" />
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
    @include('home.components.breadcrumb', [
  'title' => 'Contact',
  'description' => 'Very us move be blessed multiply night',
  'link' => 'contact',
  'linkTitle' => 'Contact'
])
    <!--================End Home Banner Area =================-->

    <!-- ================ contact section start ================= -->
  <section class="section_gap">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Get in Touch</h2>
        </div>
        <div class="col-lg-8 mb-4 mb-lg-0">
          <form class="form-contact contact_form" action="{{url('contactUs')}}" method="post" id="contactForm">
            @csrf
            <div class="row">
            <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject" required>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder="Enter Message" required></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="fullname" id="name" type="text" placeholder="Enter your fullname" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address" required>
                </div>
              </div>
            </div>
            <div class="form-group mt-lg-3">
              <button type="submit" class="main_btn">Send Message</button>
            </div>
          </form>


        </div>

        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Buttonwood, Tunis.</h3>
              <p>Rosemead</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3><a href="tel:454545654">00 (33) 000 111</a></h3>
              <p>Mon to Fri 9am to 6pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><a href="">support@</a></h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
	<!-- ================ contact section end ================= -->

    <!--================ start footer Area  =================-->
@include('home.footer')
    <!--================ End footer Area  =================-->

    <!--================Contact Success and Error message Area =================-->

    @if(session()->has('message'))
    <div id="success" class="fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Thank you</h2>
                    <p>Your message is successfully sent...</p>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- Modals error -->

    <!-- <div id="error" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Sorry !</h2>
                    <p> Something went wrong </p>
                </div>
            </div>
        </div>
    </div> -->
    <!--================End Contact Success and Error message Area =================-->




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
    <script src="home/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="home/js/jquery.ajaxchimp.min.js"></script>
    <script src="home/vendors/counter-up/jquery.waypoints.min.js"></script>
    <script src="home/vendors/counter-up/jquery.counterup.js"></script>
    <!-- contact js -->
    <script src="home/js/jquery.form.js"></script>
    <script src="home/js/jquery.validate.min.js"></script>
    <!--gmaps Js-->
    <script src="home/js/gmaps.min.js"></script>
    <script src="home/js/theme.js"></script>
    
    
    <script>
    $(document).ready(function() {
        var sessionHasMessage = true;
        if (sessionHasMessage) {
            $('#success').modal('show');
        }
    });
</script>
</body>

</html>