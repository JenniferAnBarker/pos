<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Error Page | 404 | Page not Found | UBold</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico')}}">

		<!-- Bootstrap css -->
		<link href="{{ asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
		<!-- App css -->
		<link href="{{ asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>
		<!-- icons -->
		<link href="{{ asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
		<!-- Head js -->
		<script src="{{ asset('backend/assets/js/head.js')}}"></script>

    </head>

    <!-- body start -->
    <body data-layout-mode="default" data-theme="light" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='false'>

        <!-- Begin page -->
        <div id="wrapper">

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-xl-4 mb-4">
                                <div class="error-text-box">
                                    <svg viewBox="0 0 600 200">
                                        <!-- Symbol-->
                                        <symbol id="s-text">
                                            <text text-anchor="middle" x="50%" y="50%" dy=".35em">403!</text>
                                        </symbol>
                                        <!-- Duplicate symbols-->
                                        <use class="text" xlink:href="#s-text"></use>
                                        <use class="text" xlink:href="#s-text"></use>
                                        <use class="text" xlink:href="#s-text"></use>
                                        <use class="text" xlink:href="#s-text"></use>
                                        <use class="text" xlink:href="#s-text"></use>
                                    </svg>
                                </div>
                                <div class="text-center">
                                    <h3 class="mt-0 mb-2">You Shall Not Pass! </h3>
                                    <p class="text-muted mb-3">You are not permitted to see this top secret information. Head on back!</p>

                                    <a href="{{ route('dashboard')}}" class="btn btn-success waves-effect waves-light">Back to Dashboard</a>
                                </div>
                                <!-- end row -->

                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        
                    </div> <!-- container -->

                </div> <!-- content -->

            </div>

        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>