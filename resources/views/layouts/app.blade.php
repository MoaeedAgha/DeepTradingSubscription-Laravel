<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" type="image/x-icon" href="deeptrading_frontend/assets/images/favicon.ico">
        <title>{{ config('app.name', 'Deep Trading AI') }}</title>

        <!-- Custom fonts for this template-->
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />
  
        <!-- Styles -->
        <style>
            footer.sticky-footer {
                padding: 2rem 0;
                flex-shrink: 0;
                position: fixed !important;
                bottom: 0;
                width: 100%;
            }
            body {
                background: #131827 url("{{ asset('images/poster.jpg') }}") center top no-repeat;
                background-size: cover;
                font-weight: 400;
                font-style: normal;
                font-size: 15px;
                line-height: 30px;
                color: #5e5e5e;
                padding: 0;
                margin: 0px;
                position: relative;
            }

            body:before {
                content: "";
                background-color: rgba(0, 0, 0, 0.8);
                width: 100%;
                height: 100%;
                position: fixed;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
            }

            @media (min-width: 768px){
                .sidebar .nav-item .nav-link span {
                font-size: 20px;
                display: inline;
                }

            }
            .bg-dark {
                color: #fff !important;
            }
            #wrapper #content-wrapper {
                background-color: transparent;
                width: 100%;
                overflow-x: hidden;
            }
            .card {
                border: none;
            }
            h1,h2,h3,h4,h5,h6
            {
                color: #ffffff;
                position: relative;
            }

            .homeGraph {
                margin-bottom: 15px;
                background: #282d3a;
                padding: 50px 0 25px;
                border-radius: 5px;
                width: 1070px;
                margin: 0 auto;
                position: relative;
            }
            .homeTxt {
                text-align: center;
            }
            h1 span{
                color: #2bb3ea;
                display: block;
            }

        </style>

        @yield('style')

        @yield('head-scripts')
    </head>
    <body id="page-top" class="app-image">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    @include('layouts.header')
                    @yield('content')
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
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
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

        @yield('script')

    </body>

</html>
