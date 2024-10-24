<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Product Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <style>
.description-column {
  width: 100%; /* Adjust as needed */
    overflow-wrap: break-word; /* Break long words to next line */
    white-space: normal; /* Allow text to wrap */
    word-wrap: break-word; /* For older browsers */
    height: auto; /* Ensure height can adjust */

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
                <div class="mx-auto " style="width: 200px;">
                    <h2>Products</h2>
                        @csrf
                </div>
                <table class="table table-dark">
                  <tr>
                    <td>Id</td>
                    <td>Title</td>
                    <td >Description</td>
                    <td>Quantity</td>
                    <td>Price</td>
                    <td>Discount Price</td>
                    <td>Category</td>
                    <td>Image</td>
                    <td>Action</td>
                  </tr>
                  <tbody>

                  @foreach($products as $product)
                  <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td style="width:300px"><p class="description-column"> {{ $product->description }}</p></td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->discount }}</td>
                    <td>{{ $product->category }}</td>
                    <td ><img src="product/{{ $product->image }}" alt="" style="width: 100px; height: auto;" ></td>
                    <td>
                      <a onclick="return confirm('Are You Sure To Delete')" href="{{url('delete_product',$product->id)}}"><i class="mdi mdi-delete-forever" style="font-size:24px;color:red;cursor:pointer"></i></a>
                      <a href="{{url('update_product',$product->id)}}"><i  class="mdi mdi-pencil-box-outline" style="font-size:24px;color:green;cursor:pointer"></i></a>

                    </td>
                  </tr>
                @endforeach
                <tbody>

                  
                </table>

            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>