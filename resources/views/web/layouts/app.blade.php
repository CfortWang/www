<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bean Pop</title>
    <link rel="icon" href="/img/logo/favicon.png" type="image/x-icon">
    @yield('stylesheet')
    @yield('css')

</head>
<body>
  <!-- Wrapper-->
    <div id="wrapper">
        <!-- Navigation -->
        @include('web.layouts.navigation')

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
