<!DOCTYPE html>
<html lang="en">

<head>
  <base href="/public">
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="img/favicon.png" type="image/png" />
  <title>RT ecommerce</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}" />
  <link rel="stylesheet" href="{{ asset('home/vendors/linericon/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('home/css/themify-icons.css') }}" />
  <link rel="stylesheet" href="{{ asset('home/vendors/owl-carousel/owl.carousel.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('home/vendors/lightbox/simpleLightbox.css') }}" />
  <link rel="stylesheet" href="{{ asset('home/vendors/nice-select/css/nice-select.css') }}" />
  <link rel="stylesheet" href="{{ asset('home/vendors/animate-css/animate.css') }}" />
  <link rel="stylesheet" href="{{ asset('home/vendors/jquery-ui/jquery-ui.css') }}" />
  <!-- main css -->
  <link rel="stylesheet" href="{{ asset('home/css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}" />
  <style>
    .list a {
      text-decoration: none;
      color: #ccc;
      /* Unselected star color */
    }

    .list a i {
      color: #ccc;
      font-size: 24px;
    }

    .list a.selected i {
      color: #ffcc00;
    }
  </style>
</head>

<body>
  <!--================Header Menu Area =================-->
  @include('home.header')
  <!--================Header Menu Area =================-->

  <!--================Home Banner Area =================-->
  @include('home.components.breadcrumb', [
  'title' => 'Product Detail',
  'description' => 'Very us move be blessed multiply night',
  'link' => 'product_detail/' . $product->id,
  'linkTitle' => 'Product Detail'
])
  <!--================End Home Banner Area =================-->

  <!--================Single Product Area =================-->
  <div class="product_image_area">
    <div class="container">
      <div class="row s_product_inner">
        <div class="col-lg-6">
          <div class="s_product_img">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="{{ asset('product/' . $product->image) }}" alt="First slide" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-1">
          <div class="s_product_text">
            <h3>{{$product->title}}</h3>
            @if($product->discount)
        <h2>${{$product->discount}}</h2>
        <del>${{$product->price}}</del>
      @else
    <h2>${{$product->price}}</h2>
  @endif
            <ul class="list">
              <li>
                <a class="active" href="#">
                  <span>Category</span> : {{$product->category}}</a>
              </li>
              <li>
                <a href="#"> <span>Availibility</span> : In Stock</a>
              </li>
            </ul>
            <p>
              {{$product->description}}
            </p>
            <div class="product_count">
              <form action="{{url('add_cart', $product->id)}}" method="POST" style="display:inline-block;">

                <label for="qty">Quantity:</label>
                <input type="text" name="quantity" id="sst" maxlength="12" value="1" title="Quantity:"
                  class="input-text qty" min="1" />
                <button
                  onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                  class="increase items-count" type="button">
                  <i class="lnr lnr-chevron-up"></i>
                </button>
                <button
                  onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                  class="reduced items-count" type="button">
                  <i class="lnr lnr-chevron-down"></i>
                </button>
            </div>
            <div class="card_area">
              @csrf
              @METHOD('POST')

              <button class="main_btn" href="#">Add to Cart</button>

            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->

  <!--================Product Description Area =================-->
  <section class="product_description_area">
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Description</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#specification" role="tab"
            aria-controls="specification" aria-selected="false">Specification</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
            aria-selected="false">Comments</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
            aria-selected="false">Reviews</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
          <p>
            {{$product->description}}
          </p>
          <p>
            It is often frustrating to attempt to plan meals that are designed
            for one. Despite this fact, we are seeing more and more recipe
            books and Internet websites that are dedicated to the act of
            cooking for one. Divorce and the death of spouses or grown
            children leaving for college are all reasons that someone
            accustomed to cooking for more than one would suddenly need to
            learn how to adjust all the cooking practices utilized before into
            a streamlined plan of cooking that is more efficient for one
            person creating less
          </p>
        </div>
        <div class="tab-pane fade" id="specification" role="tabpanel" aria-labelledby="profile-tab">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    <h5>Width</h5>
                  </td>
                  <td>
                    <h5>128mm</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Height</h5>
                  </td>
                  <td>
                    <h5>508mm</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Depth</h5>
                  </td>
                  <td>
                    <h5>85mm</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Weight</h5>
                  </td>
                  <td>
                    <h5>52gm</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Quality checking</h5>
                  </td>
                  <td>
                    <h5>yes</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Freshness Duration</h5>
                  </td>
                  <td>
                    <h5>03days</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>When packeting</h5>
                  </td>
                  <td>
                    <h5>Without touch of hand</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Each Box contains</h5>
                  </td>
                  <td>
                    <h5>60pcs</h5>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          <div class="row">
            <div class="col-lg-6">
              <div class="comment_list">
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img src="img/product/single-product/review-1.png" alt="" />
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <h5>12th Feb, 2017 at 05:56 pm</h5>
                      <a class="reply_btn" href="#">Reply</a>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
                <div class="review_item reply">
                  <div class="media">
                    <div class="d-flex">
                      <img src="img/product/single-product/review-2.png" alt="" />
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <h5>12th Feb, 2017 at 05:56 pm</h5>
                      <a class="reply_btn" href="#">Reply</a>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img src="img/product/single-product/review-3.png" alt="" />
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <h5>12th Feb, 2017 at 05:56 pm</h5>
                      <a class="reply_btn" href="#">Reply</a>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="review_box">
                <h4>Post a comment</h4>
                <form class="row contact_form" action="contact_process.php" method="post" id="contactForm"
                  novalidate="novalidate">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" name="message" id="message" rows="1"
                        placeholder="Message"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 text-right">
                    <button type="submit" value="submit" class="btn submit_btn">
                      Submit Now
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
          <div class="row">
            <div class="col-lg-6">
              <div class="row total_rate">
                <div class="col-6">
                  <div class="box_total">
                    <h5>Overall</h5>
                    @php
                      $total = 0;
                      $count = $comments->count();

                      foreach ($comments as $comment) {
                          $total += $comment->rating;
                      }
                      $average = $count > 0 ? $total / $count : 0; 
                     @endphp
                     <h4>{{number_format($average, 2)}}</h4>
                    <h6>{{$comments->count()}} Review(s)</h6>
                  </div>
                </div>
                <div class="col-6">
                  <div class="rating_list">
                    <h3>Based on {{$comments->count()}} Review(s)</h3>
                    <ul class="list">
                    <progress  value="{{$rating5}}" max="{{$comments->count()}}"> </progress>

                      <li>
                        <a href="#">5 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i> 01</a>
                      </li>
                      <li>
                        <a href="#">4 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i> 01</a>
                      </li>
                      <li>
                        <a href="#">3 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i> 01</a>
                      </li>
                      <li>
                        <a href="#">2 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i> 01</a>
                      </li>
                      <li>
                        <a href="#">1 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i> 01</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="review_list">
                @foreach ($comments as $comment)
          <div class="review_item">
            <div class="media">
            <div class="d-flex">
              <img src="img/product/single-product/review-1.png" alt="" />
            </div>
            <div class="media-body">
              <h4>{{$comment->name}}</h4>
              @for ($i = 0; $i < $comment->rating; $i++)
          <i class="fa fa-star"></i>
        @endfor
            </div>
            </div>
            <p>
            {{$comment->comment}}
            </p>
          </div>
        @endforeach
              </div>
            </div>
            <div class="col-lg-6">
              <div class="review_box">
                <h4>Add a Review</h4>
                <form action="{{url('add_comment', $product->id)}}" class="row contact_form" action="contact_process.php"
                  method="POST" id="contactForm" novalidate="novalidate">
                  @csrf
                  <ul class="list" id="rating">
                    <li>
                      <a href="#" data-value="1"><i class="fa fa-star"></i></a>
                    </li>
                    <li>
                      <a href="#" data-value="2"><i class="fa fa-star"></i></a>
                    </li>
                    <li>
                      <a href="#" data-value="3"><i class="fa fa-star"></i></a>
                    </li>
                    <li>
                      <a href="#" data-value="4"><i class="fa fa-star"></i></a>
                    </li>
                    <li>
                      <a href="#" data-value="5"><i class="fa fa-star"></i></a>
                    </li>
                  </ul>
                  <p>Your Rating: </p> <span id="selected-rating" class="mx-1">0</span>
                  <p>Outstanding</p>
                  <input type="hidden" value="5" id="ratingInput" name="rating">
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" name="message" id="message" rows="3"
                        placeholder="Review"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 text-right">
                    <button type="submit" value="submit" class="btn submit_btn">
                      Submit Now
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Product Description Area =================-->

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
    document.addEventListener('DOMContentLoaded', function () {
      const ratingList = document.getElementById('rating');
      const selectedRatingDisplay = document.getElementById('selected-rating');
      const ratingInput = document.getElementById('ratingInput');
      const initialRating = 5;
      const stars = ratingList.querySelectorAll('a');

      // Set initial selection
      for (let i = 0; i < initialRating; i++) {
        stars[i].classList.add('selected');
      }
      selectedRatingDisplay.textContent = 5;

      ratingList.addEventListener('click', function (e) {
        e.preventDefault();

        if (e.target.tagName === 'I' || e.target.tagName === 'A') {
          const target = e.target.closest('a');
          var ratingValue = target.getAttribute('data-value');
          // Clear previous selections
          const stars = ratingList.querySelectorAll('a');
          stars.forEach(star => {
            star.classList.remove('selected');
          });

          // Set the selected rating
          for (let i = 0; i < ratingValue; i++) {
            stars[i].classList.add('selected');
          }

          // Display the selected rating
          selectedRatingDisplay.textContent = ratingValue;
          ratingInput.value = ratingValue;
        }
      });
    });
  </script>
</body>

</html>