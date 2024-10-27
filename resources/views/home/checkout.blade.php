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
    <style>
      .orderSum{
        display:flex;
        justify-content:space-between;
      }
      .orderSum span:first-child{
        width: 100px;
      }

    </style>
  </head>

  <body>
    <!--================Header Menu Area =================-->
@include('home.header')
    <!--================Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    @include('home.components.breadcrumb', 
    ['title' => 'Checkout Detail',
    'description' => 'Very us move be blessed multiply night',
    'link' => 'checkout',
    'linkTitle' => 'Checkout Detail'
        ])

    <!--================End Home Banner Area =================-->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
      <div class="container">

        <div class="billing_details">
          <div class="row">
            <div class="col-lg-8">
              <h3>Billing Details</h3>
              <form
                class="row contact_form"
                action="#"
                method="post"
                novalidate="novalidate"
              >
                <div class="col-md-6 form-group p_star">
                  <input
                    type="text"
                    class="form-control"
                    id="first"
                    name="name"
                    value="{{Auth::user()->name}}"
                  />
     
                </div>
                <div class="col-md-6 form-group p_star">
                  <input
                    type="text"
                    class="form-control"
                    id="last"
                    name="name"
                    placeholder="name"
                  />
                </div>
                <div class="col-md-12 form-group">
                </div>
                <div class="col-md-6 form-group p_star">
                  <input
                    type="text"
                    class="form-control"
                    id="number"
                    name="number"
                    value="{{Auth::user()->phone}}"
                    placeholder="Phone number"
                  />
                </div>
                <div class="col-md-6 form-group p_star">
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="compemailany"
                    value="{{Auth::user()->email}}"
                    placeholder="email"
                  />
                </div>
                <div class="col-md-12 form-group p_star">
                  <input
                    type="text"
                    class="form-control"
                    id="add1"
                    name="add1"
                    value="{{Auth::user()->address}}"
                    placeholder="Address line 01"
                  />
                </div>
                <div class="col-md-12 form-group p_star">
                  <input
                    type="text"
                    class="form-control"
                    id="add2"
                    name="add2"
                  />
                  <span
                    class="placeholder"
                    data-placeholder="Address line 02"
                  ></span>
                </div>
                <div class="col-md-12 form-group p_star">
                  <input
                    type="text"
                    class="form-control"
                    id="city"
                    name="city"
                  />
                  <span class="placeholder" data-placeholder="Town/City"></span>
                </div>
                <div class="col-md-12 form-group p_star">
                  <select class="country_select">
                    <option value="1">District</option>
                    <option value="2">District</option>
                    <option value="4">District</option>
                  </select>
                </div>
                <div class="col-md-12 form-group">
                  <input
                    type="text"
                    class="form-control"
                    id="zip"
                    name="zip"
                    placeholder="Postcode/ZIP"
                  />
                </div>
                <div class="col-md-12 form-group">
                  <div class="creat_account">
                    <input type="checkbox" id="f-option2" name="selector" />
                    <label for="f-option2">Create an account?</label>
                  </div>
                </div>
                <div class="col-md-12 form-group">
                  <div class="creat_account">
                    <h3>Shipping Details</h3>
                    <input type="checkbox" id="f-option3" name="selector" />
                    <label for="f-option3">Ship to a different address?</label>
                  </div>
                  <textarea
                    class="form-control"
                    name="message"
                    id="message"
                    rows="1"
                    placeholder="Order Notes"
                  ></textarea>
                </div>
              </form>
            </div>
            <div class="col-lg-4">
              <div class="order_box">
                <h2>Your Order</h2>
                <ul class="list">
                  <li>
                    <a href="#"
                      >Product
                      <span>Total</span>
                    </a>
                  </li>
                  @foreach($cartItems as $cart)
                  <li class="orderSum">
        
                      <span>{{$cart->product_title}}</span>
                      <span class="">x {{$cart->quantity}}</span>
                      <span class="">${{$cart->price}}</span>
                  </li>
                  @endforeach
                  <?php
                    $total=0;
                    foreach($cartItems as $cart_info){
                        $total+=$cart_info->total;
                    }
                    ?>
                </ul>
                <ul class="list list_2">
                  <li>
                    <a href="#"
                      >Subtotal
                      <span>$<?= $total;?></span>
                    </a>
                  </li>
                  <li>
                    <a href="#"
                      >Shipping
                      <span>Flat rate: $50.00</span>
                    </a>
                  </li>
                  <li>
                    <a href="#"
                      >Total
                      <span>$<?= $total;?></span>
                    </a>
                  </li>
                </ul>
                <div class="payment_item">
                  <div class="radion_btn">
                    <input type="radio" id="f-option5" name="payment_method" value="cash"/>
                    <label for="f-option5">Pay ON Delivery</label>
                    <div class="check"></div>
                  </div>
                  <p>
                    Please send a check to Store Name, Store Street, Store Town,
                    Store State / County, Store Postcode.
                  </p>
                </div>
                <div class="payment_item active">
                  <div class="radion_btn">
                    <input type="radio" id="f-option6" name="payment_method" value="credit_card"/>
                    <label for="f-option6">Credit Card </label>
                    <img src="img/product/single-product/card.jpg" alt="" />
                    <div class="check"></div>
                  </div>
                  <p>
                    Please send a check your CC
                  </p>
                </div>
                <div class="creat_account">
                  <input type="checkbox" id="f-option4" name="selector" />
                  <label for="f-option4">I’ve read and accept the </label>
                  <a href="#">terms & conditions*</a>
                </div>
                <div id="payment-container">
                  
                  <form action="{{url('command')}}" method="POST" id="payment-form" style="display:none;"> 
                    @csrf
                    <button type="submit" class="main_btn" >Command</button>
                  </form>
                  <a id="alternative-link" style="display:none;width:max-content" class="main_btn" href="{{ url('stripe_payment',$total) }}">Proceed to Pay</a>
                
          </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Checkout Area =================-->

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
    <script>
    
    document.querySelectorAll('input[name="payment_method"]').forEach(function(el) {
    el.addEventListener('change', function() {
        const cash = document.getElementById('payment-form');
        const creditcard = document.getElementById('alternative-link');

        if (this.value === 'credit_card') {
            cash.style.display = 'none'; // Show the form
            creditcard.style.display = 'block';  // Hide the link
        } else {
            cash.style.display = 'block';   // Hide the form
            creditcard.style.display = 'none';  // Show the link
        }
        document.querySelector('input[name="payment_method"]:checked').dispatchEvent(new Event('change'));

    });
});
</script>
  </body>
</html>
