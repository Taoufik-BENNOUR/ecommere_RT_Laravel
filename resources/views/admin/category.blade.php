<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Category Admin</title>
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
                  <h2>Add Category</h2>
                  <form action="{{url('add_category')}}" method="POST">
                      @csrf
                        <div class="form-group d-flex">
                            <input type="text" class="p-1" name="category" placeholder="category">
                            <input type="submit" class="btn btn-primary" value="Add">
                        </div>
                    </form>
                </div>
                <table class="table">
                  <tr>
                    <td>Id</td>
                    <td>Category Name</td>
                    <td>Action</td>
                  </tr>
                  
                  @foreach($categories as $category)
                  <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category_name }}</td>
                     <td>
                    <form action="{{ url('delete_category', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are You Sure You Want To Delete?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" style="border: none; background: none; cursor: pointer;">
                          <i class="mdi mdi-delete-forever" style="font-size:24px;color:red;"></i>
                      </button>
                  </form>
                    </td>
                  </tr>
                @endforeach
                  
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