<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="home/img/favicon.png" type="image/png" />
    <title>RT Orders</title>
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
    <!--================Home Banner Area =================-->
    @include('home.components.breadcrumb', 
    ['title' => 'Order History',
    'description' => 'Very us move be blessed multiply night',
    'link' => 'orders',
    'linkTitle' => 'Order History'
        ])
    <!--================End Home Banner Area =================-->

    <!--================Tracking Box Area =================-->

    <section class="tracking_box_area section_gap">
        <div class="container">
        <table class="table">
              <thead>
                <tr>
                  <th scope="col">OrderID</th>
                  <th scope="col">Total</th>
                  <th scope="col">Order Date</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $order)
                <tr>
                  <td>
                        {{$order->id}}
                  </td>
                  <td>
                    <h5>{{$order->total_price}}</h5>
                  </td>
                  @php
                    $date=date_create($order->created_at);
                  @endphp
                  <td>
                    <h5>{{date_format($date,"d/m/y");}}</h5>
                  </td>
                 <td>
                 {{$order->delivery_status}}
                 </td>
                  <td>
                    <form action="{{url('cancel_order',$order->id)}}" method="POST" onsubmit="return confirm('Are You Sure You Want To Cancel Order?');">
                    @csrf
                    @METHOD('PUT')
                    @if($order->delivery_status!='Canceled')
                      <button type="submit" style="border:none;background:none;cursor:pointer;">
                            <i class="fa fa-remove" style="color:red;font-size:16px"></i>
                        </button>
                    
                    @endif
                    </form>             
                  </td>
                </tr>

                @endforeach

              </tbody>
            </table>
        </div>
    </section>
    <!--================End Tracking Box Area =================-->

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
    <script src="home/js/mail-script.js"></script>
    <script src="home/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="home/vendors/counter-up/jquery.waypoints.min.js"></script>
    <script src="home/vendors/counter-up/jquery.counterup.js"></script>
    <script src="home/js/theme.js"></script>
</body>

</html>