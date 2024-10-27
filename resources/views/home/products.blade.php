<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="home/img/favicon.png" type="image/png" />
    <title>RT Products</title>
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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
.single-product .product-img .p_icon a{
    padding: 0px !important;
}
  </style>
</head>

<body>
    <!--================Header Menu Area =================-->
    @include('home.header')
    <!--================Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    @include('home.components.breadcrumb', [
    'title' => 'Products',
    'description' => 'Very us move be blessed multiply night',
    'link' => 'product',
    'linkTitle' => 'Products'
])
    <!--================End Home Banner Area =================-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_gap">
        <div class="container">
            <div class="row">
            <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <form action="{{url('products')}}" method="GET" novalidate="novalidate" id="filter-form">
                            <aside class="left_widgets p_filter_widgets">
                                <div class="d-flex form-group" >
                                    <input type="hidden" name="category" value="{{ request('category') }}">
                                    <input type="text" class="form-control" id="order" name="search" value="{{ request('search') }}"
                                        placeholder="Search product">
                                    <button type="submit" value="submit" class="btn submit_btn">Search</button>
                                </div>
                                <div class="l_w_title">
                                    <h3>Browse Categories</h3>
                                </div>
                                <div class="widgets_inner">
                                    <ul class="list">
                                        <li class="{{ request('category') == null ? 'active' : '' }}">
                                            <a href="{{url('/products')}}">All</a>
                                        </li>
                                        @foreach ($categories as $category)
                                            <li
                                                class="{{ request('category') == $category->category_name ? 'active' : '' }}">
                                                <a href="{{ url('/products?category=' . $category->category_name . '&search=' . request('search')) }}">
                                            {{ $category->category_name }}
                                        </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </aside>
                            
                            <aside class="left_widgets p_filter_widgets">
                                <div class="l_w_title">
                                <h3>Price Filter</h3>
                            </div>
                            <div class="widgets_inner">
                                <div class="range_item">
                                    <div id="slider-range"></div>
                                    <div class="">
                                    <label for="amount">Price: </label>
                                    <input type="text" id="amount" name="price" readonly />
                                    <input type="hidden" id="min_price" name="min_price" />
                                    <input type="hidden" id="max_price" name="max_price" />
                                </div>
                            </div>
                     </div>
                        </aside>
                        </form>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="product_top_bar">
                        <div class="left_dorp">
                            <select class="sorting" onchange="location = this.value;" >
                                <option value="{{ url('/products?price=asc')}}" {{request('price') =='asc' ?"selected":"" }}>Price (asc)</option>
                                <option value="{{ url('/products?price=desc')}}" {{request('price') =='desc' ?"selected":"" }}>Price (desc)</option>

                            </select>
                            <select class="show"  onchange="location = this.value;">
                                <option value="{{ url('/products?show=6') }}" {{request('show') =='6' ?"selected":"" }}>Show 6</option>
                                <option value="{{ url('/products?show=9') }}" {{request('show') =='9' ?"selected":"" }}>Show 9</option>
                                <option value="{{ url('/products?show=12') }}" {{request('show') =='12' ?"selected":"" }}">Show 12</option>
                            </select>
                        </div>
                    </div>

                    <div class="latest_product_inner">
                        <div class="row align-items-end">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <img class="card-img" src="product/{{$product->image}}" alt="" style="height:250px;object-fit:cover;" />
                                            <div class="p_icon" style="padding:0px;">
                                                <a href="product_detail/{{$product->id}}">
                                                    <i class="ti-eye"></i>
                                                </a>
                                                <form action="{{url('add_cart',$product->id)}}" method="POST" style="display:inline-block;">
                                                     @csrf
                                                     @METHOD('POST')
                                                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" style="text-decoration: none;">
                                                        <i class="ti-shopping-cart"></i>
                                                    </a>
                                                    <input type="number" min="1" name="quantity" value="1" class="inputStyle">
                                                </form>
                                            </div>
                                        </div>
                                        <div class="product-btm">
                                            <a href="#" class="d-block">
                                                <h4>{{$product->title}}</h4>
                                            </a>
                                            <div class="mt-3">
                                                @if ($product->discount)
                                                    <span class="mr-4">${{$product->discount}}</span>
                                                    <del>${{$product->price}}</del>
                                                @else
                                                    <span class="mr-4">${{$product->price}}</span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            $("#slider-range").slider({
        range: true,
        min: 0,  
        max: 200, 
        values: [0, 200], 
        slide: function(event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            $("#min_price").val(ui.values[0]);
            $("#max_price").val(ui.values[1]);
        }

    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
    " - $" + $("#slider-range").slider("values", 1));
});
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</body>

</html>