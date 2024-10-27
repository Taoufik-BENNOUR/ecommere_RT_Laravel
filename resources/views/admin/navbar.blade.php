<nav class="navbar p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
    <a class="navbar-brand brand-logo-mini" href="{{url('dashboard')}}"><img src="admin/assets/images/logo.png"
        alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li  class="nav-item dropdown d-none d-lg-block">
      <a  href="{{url('/')}}" target="_blank" class="nav-link btn btn-info create-new-button">View Website</a>
      </li>
      <li class="nav-item dropdown d-none d-lg-block">
        <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-toggle="dropdown"
          aria-expanded="false" href="#">+ Create New</a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
          aria-labelledby="createbuttonDropdown">
          <h6 class="p-3 mb-0">Projects</h6>
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item" href="{{url('add_product')}}">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-dropbox text-danger"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1">Product</p>
            </div>
          </a>
          <a class="dropdown-item preview-item" href="{{url(path: 'view_category')}}">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-web text-info"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1">Category</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
          <p class="p-3 mb-0 text-center">See all projects</p>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
          <div class="navbar-profile">
            <img class="img-xs rounded-circle" src="{{asset('admin/assets/images/faces/face15.jpg')}}" alt="">
            <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ Auth::user()->name }}</p>
            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
          <h6 class="p-3 mb-0">Profile</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-settings text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Settings</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="dropdown-item preview-item" style="background:none;border:none;">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-logout text-danger"></i>
                </div>
              </div>
              <div class="preview-item-content" style="color: white;">
                {{ __('Log Out') }}
              </div>
            </button>
          </form>
          <div class="dropdown-divider"></div>
          <p class="p-3 mb-0 text-center">Advanced settings</p>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
      data-toggle="offcanvas">
      <span class="mdi mdi-format-line-spacing"></span>
    </button>
  </div>
</nav>