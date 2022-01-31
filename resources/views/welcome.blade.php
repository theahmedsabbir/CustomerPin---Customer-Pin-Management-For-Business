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
                <a class="navbar-brand text-red" href="{{ route('root') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="" style="width: 80%;">
                </a>
                <div class="collapse navbar-collapse float-right" id="navbarCollapseAlt">

                    <ul class="navbar-nav" style="margin-left:auto;">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('visitor.login') }}" >User Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('officer.login') }}" >Officer Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /Top Navbar -->

        

        

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <div class="hk-pg-header align-items-top">
                    <div>
                        <h2 class="hk-pg-title font-weight-600 mb-10">Welcome To Our Site</h2>
                    </div>
                </div>
                <!-- /Title -->
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hk-row">
                        
                            <div class="col-lg-12">
                                
                                <div class="card" style="border:none !important;">
                                    <div class="card-body pa-0">
                                        <p class="text-justify">
                                            You are welcome to CUSTOMERPIN.com, your platform for fulfilling the promises made to your clients. As a manufacturer, trader, representative or market maker, you want to secure your client's patronage ahead of time. If all your clients are few and within your easy reach, the challenges of attending to them when they prepay for your goods and services may not be a daunting task.......but when you have clients who are geographically wide spread or running into several hundreds or thousands in number, then you are going to have a herculean task if you don't have a platform such as this.
                                        </p><br>
                                        <p class="text-justify">

                                            You are welcome to CUSTOMERPIN.com, your platform for fulfilling the promises made to your clients. As a manufacturer, trader, representative or market maker, you want to secure your client's patronage ahead of time. If all your clients are few and within your easy reach, the challenges of attending to them when they prepay for your goods and services may not be a daunting task.......but when you have clients who are geographically wide spread or running into several hundreds or thousands in number, then you are going to have a herculean task if you don't have a platform such as this.
                                        </p><br>
                                        <p class="text-justify">    
                                            For details about putting your business on this platform, reach the administrator by email at: <span class="text-danger">info@customerpin.com</span>, Or <span class="text-danger">apsspromo@gmail.com</span>.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /Container -->
            
            <!-- Footer -->
            <div class="hk-footer-wrap container">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 text-center">
                            <p>Copyright © 2021, APSS, All Rights Reserved</p>
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