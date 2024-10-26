<!DOCTYPE html>
<html lang="en">

<head>
  <base href="/public">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Product Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css')}}">

  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">

  <!-- End layout styles -->
  <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
  <style>
    .description-column {
      width: 100%;
      /* Adjust as needed */
      overflow-wrap: break-word;
      /* Break long words to next line */
      white-space: normal;
      /* Allow text to wrap */
      word-wrap: break-word;
      /* For older browsers */
      height: auto;
      /* Ensure height can adjust */

    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      @include('admin.navbar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @if(session()->has('message'))
        <div class="alert alert-success">
        <button types='button' class='close' data-dismiss="alert" aria-hidden="true">x</button>
        {{session()->get('message')}}
        </div>
      @endif
          <div class="text-center">
            <h2>Update Product</h2>

          </div>
      <div class="row">
        
      <div class="col col-lg-8 grid-margin stretch-card mx-auto">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update product form </h4>
                <p class="card-description"> Basic form elements </p>
                <form class="forms-sample" action="{{ url('/update_product_vt', $product->id) }}" method="POST"
                  enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" value="{{ $product->title }}" class="form-control" id="title" name="title"
                      required placeholder="title">
                  </div>
                  <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category">
                      @foreach($categories as $category)
              <option value="{{ $category->category_name }}" {{ $category->category_name == $product->category ? 'selected' : '' }}>
              {{ $category->category_name }}
              </option>
            @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" value="{{ $product->price }}" id="price" name="price"
                      required placeholder="price">
                  </div>
                  <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" value="{{ $product->quantity }}" id="quantity"
                      name="quantity" required placeholder="quantity">
                  </div>
                  <div class="form-group">
                    <label for="discount">Discount</label>
                    <input type="number" class="form-control" value="{{ $product->discount }}" id="discount"
                      name="discount" placeholder="discount">
                  </div>
                  <div class="form-group">
                    <label>Image upload</label>
                    <input type="file" name="image" class="file-upload-default" value="{{ $product->image }}">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description"
                      rows="4">{{ $product->description }}</textarea>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <button class="btn btn-dark" type="button">Cancel</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col col-lg-4">
            <h3>Displayed image</h3>
            <img src="product/{{ $product->image }}" style="width:100%">
          </div>
      </div>
        </div>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('admin/assets/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
  <script src="{{asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('admin/assets/js/off-canvas.js')}}"></script>
  <script src="{{asset('admin/assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('admin/assets/js/misc.js')}}"></script>
  <script src="{{asset('admin/assets/js/settings.js')}}"></script>
  <script src="{{asset('admin/assets/js/todolist.js')}}"></script>

  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="{{asset('admin/assets/js/dashboard.js')}}"></script>
  <script src="{{asset('admin/assets/js/file-upload.js')}}"></script>

  <!-- End custom js for this page -->
</body>

</html>