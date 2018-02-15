<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('judul')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('front/css/modern-business.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/styleku.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('admina/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet"> -->

    <!-- Waves Effect Css -->
    <link href="{{asset('admina/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('admina/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <!-- <link href="{{asset('admina/css/style.css')}}" rel="stylesheet"> -->

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <!-- <link href="{{asset('admina/css/themes/all-themes.css')}}" rel="stylesheet" /> -->

   <!-- Colorpicker Css -->
   <link href="{{asset('admina/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" rel="stylesheet" />

  </head>

  <body style="background-color:#EAEAEA;">

    <!-- Navigation -->
    @include('front/navbar')


    <!-- Page Content -->
    @yield('content')

    <!-- /.container -->

    <!-- Footer -->
    @include('front/footer')

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('front/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  </body>

</html>
