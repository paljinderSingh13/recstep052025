<!DOCTYPE html>
<html lang="en">
<head>
    <!-- PAGE TITLE HERE -->
    <title>RECSTEP - Sports Club</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignLab">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="">
    <meta name="description" content="">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://cdn.socket.io/4.5.1/socket.io.min.js"></script>


</head>


<body >

    <!-- Top Bar End -->
        <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
       <!-- <div class="loading-wave">
        <div class="loading-bar"></div>
        <div class="loading-bar"></div>
        <div class="loading-bar"></div>
        <div class="loading-bar"></div>
    </div>  -->
<!-- <div class="lds-ring"><div></div><div></div><div></div><div></div></div> -->
<div class="loading">
<img src="http://recstep.com/logos/smalllogo.png" />  
</div>
</div>

<style type="text/css">
    
body {
  background: #fff;
}


.loading {
  position: absolute;
  left: 50%;
  top: 50%;
  margin: -60px 0 0 -60px;
  background: #fff;
  width: 100px;
  height: 100px;
  border-radius: 100%;
/*  border: 1px dotted rgba(215, 215, 215, 1);*/
}
.loading img{
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translateX(-50%)translateY(-50%);
    width: 80px;
}
.loading:after {
  content: '';
  background: trasparent;
  width: 100%;
  height: 100%;
  position: absolute;
  border-radius: 100%;
  top: -0%;
  left: -0%;
  opacity: 1;
/*  box-shadow: rgba(44, 120, 177, 1) -4px -4px 3px -2px;*/
  box-shadow: #23B56F -4px -4px 3px -2px;
  animation: rotate 2s infinite linear;
}

@keyframes rotate {
  0% {
    transform: rotateZ(0deg);
  }
  100% {
    transform: rotateZ(360deg);
  }
}

</style>

    <!--*******************
        Preloader end
    ********************-->

    