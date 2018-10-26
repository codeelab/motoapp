<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ config('app.name', 'MotoApp') }}</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
     <![endif]-->

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="Sistema de Ticket Gsuite">
    <meta name="author" content="Joel Álvarez - Codeelab">

    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

     <!-- Google font-->
     <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

     <!-- iconfont -->
     <link rel="stylesheet" type="text/css" href="{{ asset('icon/icofont/css/icofont.css') }}">

     <!-- simple line icon -->
     <link rel="stylesheet" type="text/css" href="{{ asset('icon/simple-line-icons/css/simple-line-icons.css') }}">

     <!-- Required Fremwork -->
     <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">


      <!-- Data Table Css -->
      <link rel="stylesheet"  href="{{ asset('plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
      <link rel="stylesheet"  href="{{ asset('plugins/datatables/css/buttons.dataTables.min.css') }}">
      <link rel="stylesheet"  href="{{ asset('plugins/datatables/css/responsive.bootstrap4.min.css') }}">
      <link rel="stylesheet"  href="{{ asset('plugins/datatables/css/editor.dataTables.min.css') }}">

     <!-- Style.css -->
     <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

     <!-- Responsive.css-->
     <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">

 </head>

  <body class="sidebar-mini fixed">
    <div class="loader-bg">
        <div class="loader-bar">
        </div>
    </div>

        @if (session('info'))
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="alert alert-success">
                        {{ session('info') }}
                    </div>
                </div>
            </div>
        </div>
        @endif

        
        @yield('content')


  </body>

      <!-- Required Jqurey -->
      <script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
      <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
      <script src="{{ asset('plugins/tether/dist/js/tether.min.js') }}"></script>

      <!-- Required Fremwork -->
      <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

      <!-- data-table js -->
      <script src="{{ asset('plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
      <script src="{{ asset('plugins/datatables/js/jszip.min.js') }}"></script>
      <script src="{{ asset('plugins/datatables/js/pdfmake.min.js') }}"></script>
      <script src="{{ asset('plugins/datatables/js/vfs_fonts.js') }}"></script>
      <script src="{{ asset('plugins/datatables/js/buttons.print.min.js') }}"></script>
      <script src="{{ asset('plugins/datatables/js/buttons.html5.min.js') }}"></script>
      <script src="{{ asset('plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
      <script src="{{ asset('plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>

      <!-- waves effects.js -->
      <script src="{{ asset('plugins/Waves/waves.min.js') }}"></script>

      <!-- Scrollbar JS-->
      <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
      <script src="{{ asset('plugins/jquery.nicescroll/jquery.nicescroll.min.js') }}"></script>

      <!--classic JS-->
      <script src="{{ asset('plugins/classie/classie.js') }}"></script>

      <!-- notification -->
      <script src="{{ asset('plugins/notification/js/bootstrap-growl.min.js') }}"></script>

      <!-- Rickshaw Chart js -->
      <script src="{{ asset('plugins/d3/d3.js') }}"></script>
      <script src="{{ asset('plugins/rickshaw/rickshaw.js') }}"></script>

      <!-- Sparkline charts -->
      <script src="{{ asset('plugins/jquery-sparkline/dist/jquery.sparkline.js') }}"></script>

      <!-- Counter js  -->
      <script src="{{ asset('plugins/waypoints/jquery.waypoints.min.js') }}"></script>
      <script src="{{ asset('plugins/countdown/js/jquery.counterup.js') }}"></script>

     <!-- Echart js -->
     <script src="{{ asset('plugins/charts/echarts/js/echarts-all.js') }}"></script>

      <!-- custom js -->
      <script src="{{ asset('js/data-table-custom.js') }}"></script>
      <script src="{{ asset('js/main.min.js') }}"></script>
      <script src="{{ asset('pages/dashboard.js') }}"></script>
      <script src="{{ asset('pages/elements.js') }}"></script>
      <script src="{{ asset('js/menu.min.js') }}"></script>

      <script>
        var $window = $(window);
        var nav = $('.fixed-button');
        $window.scroll(function(){
            if ($window.scrollTop() >= 200) {
             nav.addClass('active');
         }
         else {
             nav.removeClass('active');
         }
     });
    </script>
</html>