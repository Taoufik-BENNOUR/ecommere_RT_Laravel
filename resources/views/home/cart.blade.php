<!DOCTYPE html>
<html lang="en">

<head>
  <base href="/public">
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="/home/img/favicon.png" type="image/png" />
  <title>RT Cart</title>
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
  'title' => 'Cart',
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
              @foreach($cart as $key => $cart_info)
          <tr>
          <td>
            <div class="media">
            <div class="d-flex">
              <img src="/product/{{$cart_info->image}}" alt=""
              style="width:100px;height:100px;object-fit:cover;" />
            </div>
            <div class="media-body">
              <p>{{$cart_info->product_title}}</p>
            </div>
            </div>
          </td>
          <td>
            <h5>${{$cart_info->price}}</h5>
          </td>
          <td>
            <form action="{{ url('update_cart', $cart_info->id) }}" method="POST" class="update-cart-form">
            @csrf
            @method('PUT') <!-- Use PUT method to update -->

            <div class="product_count">
              <input type="text" name="quantity" maxlength="12" value="{{$cart_info->quantity}}" min="1"
              title="Quantity:" class="input-text qty"
              onchange="this.form.submit();"
              />
              <button type="button"
              onclick="var result = document.getElementsByName('quantity')[{{$key}}]; var qty = parseInt(result.value); if (!isNaN(qty)) result.value = qty + 1 ;this.form.submit(); "
              class="increase items-count">
              <i class="lnr lnr-chevron-up"></i>
              </button>
              <button type="button"
              onclick="var result = document.getElementsByName('quantity')[{{$key}}]; var qty = parseInt(result.value); if (!isNaN(qty) && qty > 0) result.value = qty - 1 ;this.form.submit(); "
              class="reduced items-count">
              <i class="lnr lnr-chevron-down"></i>
              </button>
            </div>
            </form>
          </td>
          <td>
            <h5>{{$cart_info->total}}</h5>
          </td>
          <td>
            <form action="{{url('delete_cart', $cart_info->id)}}" method="POST">
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
                <button class="gray_btn" type="button" onclick="document.querySelectorAll('.update-cart-form').forEach(form => form.submit());">Update Cart</button>
                </td>
                <td></td>
                <td></td>

              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Subtotal</h5>
                </td>
                <td>
                  <?php
                          $total = 0;
                          foreach ($cart as $cart_info) {
                            $total += $cart_info->total;
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
                      <li class="active">
                        <a href="#">Free Shipping</a>
                      </li>
      
                    </ul>
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
                    <a class="main_btn" href="{{url('/checkout')}}">Proceed to checkout</a>
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