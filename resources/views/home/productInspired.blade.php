<section class="new_product_area section_gap_top section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>T-shirts</span></h2>
            <p>Bring called seed first of third give itself now ment</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="new_product">
            <h5 class="text-uppercase">collection</h5>
            <h3 class="text-uppercase">Summer t-shirt</h3>
            <div class="product-img">
              <img class="img-fluid" src="img/product/new-product/new-product1.png" alt="" />
            </div>
            <a href="{{url('products?category=tshirt')}}" class="main_btn">View Collection</a>
          </div>
        </div>
        
        <div class="col-lg-6 mt-5 mt-lg-0">
          <div class="row">
          @foreach($tshirt as $product)
            <div class="col-lg-6 col-md-6">
              <div class="single-product">
                <div class="product-img">
                  <img class="img-fluid w-100" style="height:200px;object-fit:cover;" src="product/{{$product->image}}" alt="" />
                  <div class="p_icon">
                    <a href="#">
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
                    <span class="mr-4">$25.00</span>
                    <del>$35.00</del>
                  </div>
                </div>
              </div>
            </div>


          </div>
        @endforeach
        </div>
      </div>
    </div>
  </section>