<section class="feature_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Featured product</span></h2>
            <p>Bring called seed first of third give itself now ment</p>
          </div>
        </div>
      </div>

      <div class="row align-items-end">
        @csrf
        @foreach($latestProducts as $product)
        <div class="col-lg-4 col-md-6">
          <div class="single-product">
            <div class="product-img">
              <img class="img-fluid w-100 align-items-center" src="product/{{$product->image}}" alt="" />
              <div class="p_icon">
                <a href="{{url('product_detail',$product->id)}}">
                  <i class="ti-eye"></i>
                </a>
                <a href="#">
                  <i class="ti-heart"></i>
                </a>
                <a href="#">
                  <i class="ti-shopping-cart"></i>
                </a>
              </div>
            </div>
            <div class="product-btm">
              <a href="#" class="d-block">
                <h4>{{$product->title}}</h4>
              </a>
              <div class="mt-3">
                <span class="mr-4">${{$product->price - $product->discount}}</span>
                <del>${{$product->price}}</del>
              </div>
            </div>
          </div>
        </div>
        @endforeach

    {!!$latestProducts->appends(Request::all())->links()!!}


      </div>
    </div>
</section>