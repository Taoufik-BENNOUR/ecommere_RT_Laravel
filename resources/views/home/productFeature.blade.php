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
              @if($product->discount)
                <span class="mr-4">
                    ${{$product->discount}}
                </span>
                <del>${{$product->price}}</del>
                @else
                    <span>
                        ${{$product->price}}
                    </span>
                @endif
              </div>
            </div>
          </div>
        </div>
        @endforeach

    {!!$latestProducts->withQueryString()->links('pagination::bootstrap-5')!!}


      </div>
    </div>
</section>