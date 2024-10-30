<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <base href="/public">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>user Admin</title>
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
          <div class="d-flex justify-content-center mx-auto " style="width: 300px;">
            <h2>Users</h2>
            @csrf
          </div>
          <div style="margin-bottom:10px">
          <form action="{{url('users/search')}}" method="GET" class="form-inline mb-2 my- my-lg-0 d-none d-lg-flex align-items-center justify-content-center search">
            <input style="color:white" type="text" class="form-control" placeholder="Search user" name="search" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Search</button>
          </form>
          </div>
          <table class="table table-dark">
            <tr>
              <td>N*</td>
              <td>Id</td>
              <td>Name</td>
              <td>Email</td>
              <td>Address</td>
              <td>Phone</td>
              <td>Status</td>
              <td>Action</td>
            </tr>
            <tbody>

              @foreach($users as $key =>$user)
          <tr>
          <td>{{ $key+1 }}</td>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->address }}</td>
          <td>{{ $user->phone }}</td>
          <td class="{{ $user->status=="active"?'text-success':'text-danger' }}">{{ $user->status }}</td>
          <td>
            <form action="{{url('block_user', $user->id)}}" method="post" onsubmit="return confirm('Are You Sure To {{$user->status=='active'?'block':'activate'}}  User')" >
            @method('put')
            @csrf
            <button type="submit" style="background:none;border:none;">
                @if ($user->status =="active")
                <i class="mdi mdi-block-helper" style="font-size:24px;color:red;cursor:pointer"></i>
                @else
                <i class="mdi mdi-check-circle" style="font-size:24px;color:green;cursor:pointer"></i>
                @endif
              </button>
            </form>
            <!-- <a href="{{url('update_user', $user->id)}}"><i class="mdi mdi-pencil-box-outline"
              style="font-size:24px;color:green;cursor:pointer"></i></a> -->

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