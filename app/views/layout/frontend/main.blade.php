<!DOCTYPE HTML>
<html lang="en">
  <head>
          <title>Floretz - Montessori School in Bangalore, India</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="{{url()}}/assets/css/bootstrap.css" rel="stylesheet">
    <link href="{{url()}}/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <!--<link href="fonts/stylesheet.css" rel="stylesheet">-->
    <link href="{{url()}}/assets/css/floretz.css" rel="stylesheet">
    <link href="{{url()}}/assets/css/custom_responsive.css" rel="stylesheet">
    <link href="{{url()}}/assets/css/custom_grid.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="{{url()}}/assets/ico/favicon.png">
    
    @yield('CSS')
  </head>
  <body>
  @include('layout.frontend.navbar')
  <div class="container_wr">
      @section('pagedata')














     
      @show
  </div>
  @include('layout.frontend.footer')
  <script type="text/javascript" src="{{url()}}/assets/js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="{{url()}}/assets/js/customfront.js"></script>
  @section('JS')
  
  </script>




  @show
  
  
  <?php if(isset($mainsite)){?>
  <script>
      
  $('#<?php echo $mainsite;?>').addClass('active');
  </script>
  <?php } ?>
  </body>