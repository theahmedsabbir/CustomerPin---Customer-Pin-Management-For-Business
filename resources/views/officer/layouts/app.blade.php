<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Apss</title>
    <meta name="description" content="Apss" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
    <!-- Toggles CSS -->
    <link href="{{ asset('vendors/jquery-toggles/css/toggles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendors/jquery-toggles/css/themes/toggles-light.css') }}" rel="stylesheet" type="text/css">

    <!-- Data Table CSS -->
    <link href="{{ asset('vendors/datatables.net-dt/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    
    <!-- Toastr CSS -->
    {{-- <link href="{{ asset('vendors/jquery-toast-plugin/dist/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"> --}}
    
    <!-- Morris Charts CSS -->
    <link href="{{ asset('vendors/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />
    
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-alt-nav">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar hk-navbar-alt py-2" style="position: unset !important;">
            <div class="container">
                
                <a class="navbar-toggle-btn nav-link-hover navbar-toggler" href="javascript:void(0);" data-toggle="collapse" data-target="#navbarCollapseAlt" aria-controls="navbarCollapseAlt" aria-expanded="false" aria-label="Toggle navigation"><span class="feather-icon"><i data-feather="menu"></i></span></a>
                <a class="navbar-brand text-red" href="{{ route('officer.home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="" style="width: 80%;">
                </a>
                <div class="collapse navbar-collapse float-right" id="navbarCollapseAlt">

                    <ul class="navbar-nav" style="margin-left:auto;">
                        @guest('officer')

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('visitor.login') }}" >User Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('officer.login') }}" >Officer Login</a>
                        </li>


                        @else

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('officer.home') }}" >Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('officer.visitors') }}" >Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('officer.addVisitor') }}" >Add User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('officer.editOfficer') }}" >Edit Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();" >Logout</a>

                                <form id="logout-form" action="{{ route('officer.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /Top Navbar -->

        

        

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Container -->
            @yield('main_section')
            <!-- /Container -->
            
            <!-- Footer -->
            <div class="hk-footer-wrap container">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>Copyright © 2021, APSS, All Rights Reserved</p>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <p>Developed By <a href="https://www.primexsystems.com/">Primex Systems</a></p>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{asset('dist/js/jquery.slimscroll.js')}}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{asset('dist/js/dropdown-bootstrap-extended.js')}}"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="{{asset('dist/js/feather.min.js')}}"></script>

    <!-- Toggles JavaScript -->
    <script src="{{asset('vendors/jquery-toggles/toggles.min.js')}}"></script>
    <script src="{{asset('dist/js/toggle-data.js')}}"></script>
    
    <!-- Counter Animation JavaScript -->
    <script src="{{asset('vendors/waypoints/lib/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('vendors/jquery.counterup/jquery.counterup.min.js')}}"></script>
    
    <!-- Morris Charts JavaScript -->
    <script src="{{asset('vendors/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('vendors/morris.js/morris.min.js')}}"></script>
    
    <!-- EChartJS JavaScript -->
    <script src="{{asset('vendors/echarts/dist/echarts-en.min.js')}}"></script>

    <!-- Owl JavaScript -->
    <script src="{{asset('vendors/owl.carousel/dist/owl.carousel.min.js')}}"></script>


    <!-- Data Table JavaScript -->
    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dist/js/dataTables-data.js') }}"></script>
    
    <!-- Toastr JS -->
    {{-- <script src="{{asset('vendors/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script> --}}
    
    <!-- Init JavaScript -->
    <script src="{{asset('dist/js/init.js')}}"></script>
    <script src="{{asset('dist/js/dashboard4-data.js')}}"></script>
    
    <style>
        
        .hk-pg-wrapper{
            min-height: 85vh !important;
        }
    </style>
</body>

</html>