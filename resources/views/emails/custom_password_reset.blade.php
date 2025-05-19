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


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- STYLE CSS -->
    <!-- <link  href="{{asset('assets/css/style.css')}}" rel="stylesheet"> -->

    <style type="text/css">
        body{
            font-size: 16px;
            line-height: 26px;
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
            background-color: #e8e8e8;
        }
        .email-container{
            max-width: 600px;
            padding: 50px;
            border-radius: 10px;
            background-color: #ffffff;
            margin: 0 auto;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .brandlogo{
            text-align: center;
        }
        .brandlogo img{
            max-width:300px;
        }
        .text-center{
            text-align: center;
        }
        .btn-primary {
            background-color: #006395;
            padding: 14px 20px;
            border-radius: 6px;
            font-size: 1.2rem;
            font-weight: 500;
            color: #ffffff;
            text-decoration: none;
            display: inline-block;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .btn-primary:hover{
            background-color: #23B56F;
        }
        p{
            margin:0  0 20px 0;
        }
        .btn-wrapper{
            margin: 20px 0px;
            text-align: center;
        }
        .emailtitle{
            font-weight: 500;
            font-size: 25px;
        }
    </style>
</head>
<body>
    <!-- Email Container -->
    <section style=" background-color: #e8e8e8; padding: 70px 0px;">
    <div class="email-container" style="">

        <!-- Header with Logo -->
        <div class="brandlogo" style="text-align: center;">
            <a href="#"><img src="{{asset('assets/images/logo.png')}}"   alt="logo"></a>
        </div>
        
        <!-- Main Content -->
        <h2 class="text-center emailtitle" >Reset Your Password</h2>
        <p>Hello {{ucwords($user['name'])}} {{ucwords($user['last_name'])}},</p>
        <p>You requested to reset your password. Click the button below to set a new password for your account. If you didn’t request a password reset, please ignore this email.</p>

        <!-- Reset Password Button -->
        <div class=" btn-wrapper">
            <a href="{{ url('user/password/reset', $token) }}" class="btn btn-primary btn-lg" style="color:white!important">
                Reset Password
            </a>
        </div>
        
        <p>For your security, this link will expire in 60 minuts.</p>

        <!-- Footer -->
        <hr>
        <div class="text-center mt-4" style="font-size: 14px; color: #666;">
            <p>If you have any questions, please contact our support team at 
                <a href="mailto:support@recstep.com" style="color: #007bff; text-decoration: none;"><br>support@recstep.com</a>.
            </p>
            <p style="font-size: 12px; color: #999;">&copy; 2024 Recstep. All rights reserved.</p>
        </div>
    </div>
    </section>


           <!--**********************************
            Footer start
            ***********************************-->
            <div class="footer" style="display: none;">
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