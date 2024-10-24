<!DOCTYPE html>
<html lang="en">
    <head>
      <base href="/public">
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="img/favicon.png" type="image/png" />
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
    <link rel="stylesheet" href="/home/css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
  </head>

  <body>
    <!--================Header Menu Area =================-->
@include('home.header')
    <!--================Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    @include('home.components.breadcrumb', ['title' => 'Cart',
    'description' => 'Very us move be blessed multiply night',
    'link' => 'cart',
    'linkTitle' => 'Cart'
        ])
    <!--================End Home Banner Area =================-->
@csrf
    <!--================Cart Area =================-->
    <section class="cart_area">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach($cart as $cart_info)
                <tr>
                  <td>
                    <div class="media">
                      <div class="d-flex">
                        <img
                          src="/product/{{$cart_info->image}}"
                          alt=""
                          style="width:100px;height:100px;object-fit:cover;"
                        />
                      </div>
                      <div class="media-body">
                        <p>{{$cart_info->product_title}}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <h5>${{$cart_info->price / $cart_info->quantity}}</h5>
                  </td>
                  <td>
                    <div class="product_count">
                      <input
                        type="text"
                        name="qty"
                        id="sst"
                        maxlength="12"
                        value="{{$cart_info->quantity}}"
                        title="Quantity:"
                        class="input-text qty"
                      />
                      <button
                        onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                        class="increase items-count"
                        type="button"
                      >
                        <i class="lnr lnr-chevron-up"></i>
                      </button>
                      <button
                        onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                        class="reduced items-count"
                        type="button"
                      >
                        <i class="lnr lnr-chevron-down"></i>
                      </button>
                    </div>
                  </td>
                  <td>
                    <h5>{{$cart_info->price}}</h5>
                  </td>
                  <td>
                    <form action="{{url('delete_cart',$cart_info->id)}}" method="POST">
                    @csrf
                    @METHOD('delete')
                    <button type="submit">
                            <i class="fa fa-remove" style="color:red;font-size:16px"></i>
                        </button>
                    </form>             
                  </td>
                </tr>

                @endforeach

                <tr class="bottom_button">
                  <td>
                    <a class="gray_btn" href="#">Update Cart</a>
                  </td>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="cupon_text">
                      <input type="text" placeholder="Coupon Code" />
                      <a class="main_btn" href="#">Apply</a>
                      <a class="gray_btn" href="#">Close Coupon</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Subtotal</h5>
                  </td>
                  <td>
                    <?php
                    $total=0;
                    foreach($cart as $cart_info){
                        $total+=$cart_info->price;
                    }
                    ?>
                    <h5>$<?= $total; ?></h5>
                  </td>
                </tr>
                <tr class="shipping_area">
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Shipping</h5>
                  </td>
                  <td>
                    <div class="shipping_box">
                      <ul class="list">
                        <li>
                          <a href="#">Flat Rate: $5.00</a>
                        </li>
                        <li>
                          <a href="#">Free Shipping</a>
                        </li>
                        <li>
                          <a href="#">Flat Rate: $10.00</a>
                        </li>
                        <li class="active">
                          <a href="#">Local Delivery: $2.00</a>
                        </li>
                      </ul>
                      <h6>
                        Calculate Shipping
                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                      </h6>
                      <select class="shipping_select">
                        <option value="1">DE</option>
                        <option value="2">FR</option>
                        <option value="4">ES</option>
                      </select>
                      <select class="shipping_select">
                        <option value="1">Select a State</option>
                        <option value="2">Select a State</option>
                        <option value="4">Select a State</option>
                      </select>
                      <input type="text" placeholder="Postcode/Zipcode" />
                      <a class="gray_btn" href="#">Update Details</a>
                    </div>
                  </td>
                </tr>
                <tr class="out_button_area">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="checkout_btn_inner">
                      <a class="gray_btn" href="{{url('/')}}">Continue Shopping</a>
                      <a class="main_btn" href="#">Proceed to checkout</a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!--================End Cart Area =================-->

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
    <script src="js/mail-script.js"></script>
    <script src="vendors/jquery-ui/jquery-ui.js"></script>
    <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendors/counter-up/jquery.counterup.js"></script>
    <script src="js/theme.js"></script>
  </body>
</html>
