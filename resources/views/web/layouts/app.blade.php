<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bean Pop - {{$title}}</title>
    <link rel="icon" href="/img/seedo.ico" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name=”keywords” content="" />
    <meta name=”description” content="" />
    <link rel="stylesheet" type="text/css" href="./css/swiper.min.css" />
    <script src="./js/swiper.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/jquery.timepicker.min.css">
    <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
    <script src="./js/jquery.timepicker.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    @yield('stylesheet')
    @yield('css')

</head>
<body>
  <!-- Wrapper-->
    <div id="wrapper">
        <!-- Navigation -->

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            @include('web.layouts.topnavbar')

            <!-- Main view  -->
            @yield('content')

            <!-- Footer -->
            @include('web.layouts.footer')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->
<script>
$(document).ready(function(){

});
</script>
@section('scripts')
@show

</body>
</html>
