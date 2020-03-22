<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'Welcome Admin')</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor1/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->

  <!-- Custom styles for this page -->
  <link href="{{asset('vendor1/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css1/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img style="height:30px;width:30px;border-radius:50px" src="{{asset('/img/download.png')}}" alt="">
        </div>
    <div class="sidebar-brand-text mx-3"> </div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-users"></i>
          <span>Students</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/students">View Registered Students</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-user"></i>
          <span>Teachers</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="/teachers">View Registered Teachers</a>
          </div>
        </div>
      </li>

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-wrench"></i>
          <span>Pins</span>
        </a>
        @php
    @endphp
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">

            <a class="collapse-item" href="/pin">Generate Pins</a>

            <a class="collapse-item" href="/generatedpins">View Generated Pins  <span class="bg-danger text-white p-1">hi</span></a>
          </div>
        </div>
      </li> --}}

      <!-- Divider -->
      <hr class="sidebar-divi der">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Logout</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Logout screen:</h6>
          <a class="collapse-item" href="{{ url('/logoutadmin') }}"
>

               <i
                   class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
               ></i> {{ __('Logout') }}
       </a>

       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           @csrf
       </form>

          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->

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
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text"  class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a title="Homepage" class="nav-link " href="/" id="" role="link" data-toggle="" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-home fa-1x"></i>
                </a>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a title="Students" class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-users "></i>
                @php
                    $students = count($students);
                @endphp
                <!-- Counter - Alerts -->
              <span class="badge badge-danger badge-counter">{{$students}}</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                 Students Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="/students">

                    <div class="font-weight-bold">
                      <div class="text-truncate">@php
                          if($students == 0){
                                 echo 'No Student has been registered';

                          }
                           elseif ($students == 1) {
                               echo $students. ' Student has been registered ';
                           }
                           else {
                               echo $students. ' Students have been registered';
                           }
                      @endphp
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="/students">

                    <div>
                      <div class="text-truncate font-weight-bold">Go to Students board</div>
                    </div>
                  </a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            {{-- <li class="nav-item dropdown no-arrow mx-1">
              <a title="Teachers" class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i>
                <!-- Counter - Messages -->
              <span class="badge badge-danger badge-counter">{{$teachers}}</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                 Teachers Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="/teachers">

                  <div class="font-weight-bold">
                    <div class="text-truncate">@php
                        if($teachers == 0){
                               echo 'No Teacher has been registered';

                        }
                         elseif ($teachers == 1) {
                             echo $teachers. ' Teacher has been registered ';
                         }
                         else {
                             echo $teachers. ' Teachers have been registered';
                         }
                    @endphp
                    </div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="/teachers">

                  <div>
                    <div class="text-truncate font-weight-bold">Go to teachers board</div>
                  </div>
                </a>
                </div> --}}
            </li>
            <li class="nav-item dropdown no-arrow mx-1">

                <a title="Logout" class="nav-link dropdown-toggle" href="{{ url('/logout') }}" >

                  <i
                  class="fas fa-sign-out-alt fa-2x fa-fw mr-2 text-gray-400"
              ></i>
                 </a>


            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

           <h4 class=" "> Admin Panel for Students And Teachers</h4>
     @include('layouts.msg')
 @yield('content')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



      <!-- Footer -->
      <footer class="sticky-footer bg-dark p-3 text-white mt-3 mb-2">
        <div class="container my-auto">
          <div class="copyright text-center my-auto ">
            <span class="">Copyright &copy; <b>Sunshinecoder's</b>  Admin Panel for Students, 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    <!-- End of Content Wrapper -->

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
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('vendor1/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor1/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor1/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
  <script src="{{asset('js1/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
  <script src="{{asset('vendor1/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
  <script src="{{asset('js1/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('js1/demo/chart-pie-demo.js')}}"></script>


    <!-- Core plugin JavaScript-->

    <!-- Custom scripts for all pages-->

    <!-- Page level plugins -->
    <script src="{{ asset('vendor1/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{asset('vendor1/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js1/demo/datatables-demo.js') }}"></script>

</body>

</html>
