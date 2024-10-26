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
                    <h2>Orders</h2>
                        @csrf
                </div>
                <table class="table table-dark">
                  <tr>
                    <td>Id</td>
                    <td>Email</td>
                    <td>Total</td>
                    <td>Payment status</td>
                    <td>Delivery status</td>
                    <td>Order Date</td>
                    <td>Confirm Devlivery</td>
                    <td>Confirm Payment</td>
                    <td>Confirm Delivery</td>  
                    <td>Print</td>  
               </tr>
                  <tbody>

                  @foreach($orders as $order)
                  <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td><label class='{{$order->payment_status =='Paid'?"badge badge-success":"badge badge-warning"}}'>{{ $order->payment_status }}</label></td>
                    <td><label class='{{Str::lower($order->delivery_status) =='processing'?"badge badge-danger":"badge badge-primary"}}'>{{ $order->delivery_status }}</label></td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                      <a href="{{url('order_detail',$order->id)}}"><i class="mdi mdi-eye" style="font-size:24px;color:green;cursor:pointer"></i></a>
                    </td>
                    <td><a class="btn btn-inverse-primary" href="{{url('confirm_payment',$order->id)}}">Confirm Payment</a></td>
                    <td><a class="btn btn-inverse-secondary" href="{{url('confirm_delivery',$order->id)}}">Confirm Delivery</a></td>
                    <td><a href="{{url('print',$order->id)}}"><i class="mdi mdi-file-pdf" style="font-size:30px;color:red;cursor:pointer" ></i></a></td>
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