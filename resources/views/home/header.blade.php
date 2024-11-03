
<header class="header_area">
  <div class="top_menu">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="float-left">
            <p>Phone: +01 256 25 235</p>
            <p>email: rt@uvt.tn</p>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="float-right">
            <ul class="right_side">
              <li>
                <a href="{{url('order_history')}}">
                  track order
                </a>
              </li>
              <li>
                <a href="{{url('contact')}}">
                  Contact Us
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main_menu">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light w-100">
        <!-- Brand and toggle get grouped for better mobile display -->
        <a class="navbar-brand logo_h" href="{{url('/')}}">
          <img src="{{asset('img/logo.png')}}" alt="" style="width:100px" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
          <div class="row w-100 mr-0">
            <div class="col-lg-7 pr-0">
              <ul class="nav navbar-nav center_nav pull-right d-flex align-items-center">
                <li class="nav-item active">
                  <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item submenu dropdown">
                  <a href="{{url('products')}}" class="nav-link">Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('contact')}}">Contact</a>
                </li>

              </ul>
            </div>

            <div class="col-lg-5 pr-0">
              <ul class="nav navbar-nav navbar-right right_nav pull-right align-items-center">
                <li class="nav-item">
                  <a href="{{url('products')}}" class="icons">
                    <i class="ti-search" aria-hidden="true"></i>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{url('cart')}}" class="icons">
                    <i class="ti-shopping-cart"></i>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{url('user/profile')}}" class="icons">
                    <i class="ti-user" aria-hidden="true"></i>
                  </a>
                </li>
                @if (Route::has('login'))
          @auth
      <li class="nav-item submenu dropdown" style="margin-left:20px !important;">
                    <a href="#" class="nav-link dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false"> {{ Auth::user()->name }} <i class="fa fa-caret-down"></i></a>
                      
                    <ul class="dropdown-menu">
        
                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('/user/profile') }}">Profile</a>
                      </li>
                      @if(Auth::user()->userType == 1)
                      <li class="nav-item">
                        <a class="nav-link" href={{ url('/dashboard') }}>Dashboard</a>
                      </li>
                        @endif
          
                      <form method="POST" action="{{ route('logout') }}" class="nav-item" style="width:100%">
                      @csrf
                        <button type="submit" class="nav-link" style="border:none;">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                    </ul>
                  </li>
      @else
      <li class="">
      <a class="btn btn-outline-success" href="{{route('login')}}">Login</a>
      </li>
      <li class="">
      <a class="btn btn-outline-success" href="{{route('register')}}"><i class="fa fa-user-plus"
        aria-hidden="true"></i></a>
      </li>
               @endauth
                 @endif


              </ul>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>
</header>
