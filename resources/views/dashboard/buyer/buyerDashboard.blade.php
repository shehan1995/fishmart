<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Fish Mart Admin</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('css/css/sb-admin-2.css')}}" rel="stylesheet">
  <style>
    .image {
      background-image: url("https://i.ibb.co/72BkCpv/16457165.jpg");
      background-repeat: no-repeat, repeat;
      background-size: 100% 100%;
      position: relative;
      height: 100vh;
      opacity: 1;
    }
    .image:before{
      content: '';
      opacity: 0.1;
      position: absolute;
      top: 0;
      right: 0;
      left: 0;
      bottom: 0;
      background: rgba(0,0,0,0.7);
    }
    .text-modified{
      color: #ffffff;
    }
  </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center"  href="/">
        <div class="sidebar-brand-icon rotate-n-15">
{{--          <i class="fas fa-laugh-wink"></i>--}}
          <img src="{{asset('images/logo.png')}}" style="height: 50px; width: 50px">
        </div>
        <div class="sidebar-brand-text mx-3">BUYER {{$details['name']}}</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('dashboard/')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">



      <!-- Nav Item - Create ADD -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('dashboard/buyer/createAdd')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Create Advertisement</span></a>
      </li>

      <!-- Nav Item - View selling adds -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('dashboard/buyer/viewSellingAdds')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Selling Advertisements</span></a>
      </li>

      <!-- Nav Item - View My Orders -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('dashboard/buyer/viewOrders')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>My Orders</span></a>
      </li>

      <!-- Nav Item - View My Orders -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('dashboard/buyer/viewBuyingAdds')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>My Advertisements</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url('dashboard/buyer/viewAlerts')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>View Alerts</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div style="background-image: url('https://i.ibb.co/72BkCpv/16457165.jpg');
       background-repeat: no-repeat, repeat;
      background-size: 100% 100%;
      position: relative;
      height: 100vh;
      opacity: 1;" id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">



            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-modified ">{{$details['name']}}</span>
                <img class="img-profile rounded-circle" src="{{asset($details['user_image'])}}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{url('dashboard/buyer/viewProfile')}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="{{url('dashboard/buyer/profile-edit')}}">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{url('logout')}}" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        @yield('body')
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href={{url('logout')}}>Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/js/demo/chart-area-buyer.js')}}"></script>
  <script src="{{asset('js/js/demo/chart-pie-buyer.js')}}"></script>



</body>

</html>
