<!DOCTYPE html>
<html lang="en">
<head>
    <!-- PAGE TITLE HERE -->
    <title>RECSTEP - Sports Club</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignLab">
    <meta name="keywords" content="">
    <meta name="description" content="">
    

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" href="images/favicon1.ico">
    <link href="{{asset('assets/vendor/swiper/css/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">

    <!-- STYLE CSS -->
    <link  href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>
<body>


    <div class="authincation d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="login-aside text-center d-none d-sm-flex flex-column flex-row-auto">
            <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                <div class="text-center mb-4 pt-5">
                    <a href="#"><img src="{{asset('assets/images/logo.png')}}" class="dark-login img-fluid w-50"  alt=""></a>
                    <a href="#"><img src="{{asset('assets/images/logo.png')}}" class="light-login img-fluid w-50" alt=""></a>
                </div>
                <h3 class="mb-2">Welcome back!</h3>
                <p>User Experience & Interface Design <br>Strategy SaaS Solutions</p>
            </div>
            <div class="aside-image" style="background-image:url(assets/images/pic1.svg);"></div>
        </div>
        <div class="container flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <div class="d-flex justify-content-center h-100 align-items-center">
                <div class="authincation-content style-2">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form bg-white rounded shadow p-lg-5 p-3">
                                <div class="text-center d-block d-sm-none mb-4 pt-5">
                                    <a href="#"><img src="{{asset('assets/images/logo.png')}}" class="dark-login img-fluid w-50"  alt=""></a>
                                    <a href="#"><img src="{{asset('assets/images/logo.png')}}" class="light-login img-fluid w-50" alt=""></a>
                                </div>
                                <div class="text-center">

                                    <h4 class="text-center mb-4">Password reset link sent</h4>
                                    <p>If a valid user with this email address exists, we'll send you an email with a secure link to reset your password.</p>
                                    <div class="new-account mt-3">
                                        <p><a class="btn btn-primary " href="#">Back to Login</a></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



            <!--**********************************
            Footer start
            ***********************************-->
            <div class="footer">
                <div class="copyright">
                    <p>Copyright © 2024 - All Right Reserved By RECSTEP</p>
                </div>
            </div>


            <!-- Required vendors -->
            <script src="{{asset('vendor/global/global.min.js')}}"></script>
            <script src="{{asset('vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
            <!-- Apex Chart -->
            <script src="{{asset('vendor/apexchart/apexchart.js')}}"></script>
            <script src="{{asset('vendor/chart-js/chart.bundle.min.js')}}"></script>
            <!-- Chart piety plugin files -->
            <script src="{{asset('vendor/peity/jquery.peity.min.js')}}"></script>
            <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>
            <script src="{{asset('vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
            <script src="{{asset('vendor/jqvmap/js/jquery.vmap.world.js')}}"></script>
            <script src="{{asset('vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
            <!-- Dashboard 1 -->
            <script src="{{asset('js/dashboard/dashboard-1.js')}}"></script>
            <script src="{{asset('vendor/swiper/js/swiper-bundle.min.js')}}"></script>
            <script src="{{asset('js/custom.js')}}"></script>
            <script src="{{asset('js/ic-sidenav-init.js')}}"></script>
            <!-- <script src="js/demo.js"></script> -->
            <!-- <script src="js/styleSwitcher.js"></script> -->

            <!-- Initialize Swiper -->
            <script>
                var swiper = new Swiper(".mySwiper", {
                    slidesPerView: 1.5,
                    spaceBetween: 15,
                    navigation: {
                        nextEl: "",
                        prevEl: "",
                    },
                    breakpoints: {
                        360: {
                            slidesPerView: 1.5,
                            spaceBetween: 20,
                        },
                        768: {
                            slidesPerView: 2.5,
                            spaceBetween: 40,
                        },
                        1200: {
                            slidesPerView: 1.5,
                            spaceBetween: 20,
                        },
                    },
                });
                var swiper = new Swiper(".mySwiper1", {
                    slidesPerView: 4,
                    spaceBetween: 15,
                    navigation: {
                        nextEl: "",
                        prevEl: "",
                    },
                    breakpoints: {
                        360: {
                            slidesPerView: 1.5,
                            spaceBetween: 20,
                        },
                        768: {
                            slidesPerView: 2.5,
                            spaceBetween: 20,
                        },
                    },
                });
            </script>

            <!--**********************************
            Footer end
            ***********************************-->
            <style type="text/css">
                .footer{
                    display: none;
                }
            </style>

        </body>


        </html>