<!DOCTYPE HTML>
<html>
    <head>
        <title>Admin | Floretz </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            @section('head')
	    	<!-- bootstrap CSS -->
                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
                <!-- Custom CSS -->
                <link href="{{url()}}/assets/css/style.css" rel='stylesheet' type='text/css' />
                <!-- font CSS -->
                <!-- font-awesome icons -->
                <link href="{{url()}}/assets/css/font-awesome.css" rel="stylesheet"> 
                <!-- //font-awesome icons -->
                <!-- js-->
                <script src="{{url()}}/assets/js/jquery-1.11.1.min.js"></script>
                <script src="{{url()}}/assets/js/modernizr.custom.js"></script>
                <!--webfonts-->
                <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
                <!--//webfonts--> 
                <!--animate-->
                <link href="{{url()}}/assets/css/animate.css" rel="stylesheet" type="text/css" media="all">
                <script src="{{url()}}/assets/js/wow.min.js"></script>
                <script>
                     new WOW().init();
                </script>
                <!--//end-animate-->
                <!-- chart -->
                <script src="{{url()}}/assets/js/Chart.js"></script>
                <!-- //chart -->



                <!--Calender 
                <link rel="stylesheet" href="{{url()}}/assets/css/clndr.css" type="text/css" />
                <script src="{{url()}}/assets/js/underscore-min.js" type="text/javascript"></script>
                <script src= "{{url()}}/assets/js/moment-2.2.1.js" type="text/javascript"></script>
                <script src="{{url()}}/assets/js/clndr.js" type="text/javascript"></script>
                <script src="{{url()}}/assets/js/site.js" type="text/javascript"></script>
                <!--End Calender-->
                <!-- Metis Menu -->//
                <script src="{{url()}}/assets/js/metisMenu.min.js"></script>
                <script src="{{url()}}/assets/js/custom.js"></script>
                <link href="{{url()}}/assets/css/custom.css" rel="stylesheet">


                
                <!--//Metis texteditor //here is the links bro-->
                
                <!--<script src="{{url()}}/assets/ckeditor/samples/js/sample.js"></script>
                <link rel="stylesheet" href="{{url()}}/assets/ckeditor/samples/css/samples.css">
                <link rel="stylesheet" href="{{url()}}/assets/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">-->
                <!--//For Colorfull alerts 
                <script src="{{url()}}/assets/js/ckeditor.js"></script>
				<script src="{{url()}}/assets/js/js/sample.js"></script>
				<link rel="stylesheet" href="{{url()}}/assets/css/css/samples.css">
				<link rel="stylesheet" href="{{url()}}/assets/toolbarconfigurator/lib/codemirror/neo.css">
                -->
            @show
            @yield('headCSS')
    </head>
    
    
 <body class="cbp-spmenu-push">
	<div class="main-content">
	@section('layout.sidebar')
        
<!--left-fixed -navigation-->
           <div class=" sidebar" role="navigation">
                <div class="navbar-collapse">
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
					<ul class="nav" id="side-menu">
						<li>
							<a  id="dashboard" href="{{url()}}/dashboard"><i class="fa fa-home nav_icon"></i>Dashboard</a>
						</li>

						<li>
							<a  id="media" href="{{url()}}/media"><i class="fa fa-music nav_icon"></i>Media<span class="nav-badge">1</span><span class="fa arrow"></span></a>
						</li>

                                                <li class="">
							<a  id="contents" href="#"><i class="fa fa-th-large nav_icon"></i>Contents <span class="nav-badge">5</span><span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a id="banner" href="{{url()}}\dashboard\banner">Banner images</a>
								</li>
								<li>
									<a id="birthday" href="{{url()}}\dashboard\birthday">Birthday images</a>
								</li>
                                                                <li>
									<a id= "announcemnets" href="{{url()}}\dashboard\announcements">Flash Content</a>
								</li>
                                                                <li>
									<a id="parentspeak" href="{{url()}}\dashboard\parentsspeak">Parents Speak</a>
								</li>
                                                                <li>
									<a id="events" href="{{url()}}\dashboard\events">Events</a>
								</li>
							</ul>
							<!-- /nav-second-level -->
						</li>
                                                <!--
						<li>
							<a href="#"><i class="fa fa-th-large nav_icon"></i>Widgets <span class="nav-badge-btm">08</span></a>
						</li>
                                                -->
						<li>
							<a href="#" id="users"><i class="fa fa-user nav_icon"></i>Users <span class="nav-badge">2</span><span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a id = 'addadminuser' href="{{url()}}\adminusers\addadminuser">Add User </a>
								</li>
								<li>
									<a href="{{url()}}\adminusers\viewusers">All Users</a>
								</li>
                                                                <li>
									<a href="{{url()}}\adminusers\youprofile">Your Profile</a>
								</li>
							</ul>
							<!-- //nav-second-level -->
						</li>


						<li>
							<a href="#" id="pages"><i class="fa fa-user nav_icon"></i>Home & About Pages <span class="nav-badge">5</span><span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a id = 'homePage' href="{{url()}}\pages\homePage">Home Page</a>
								</li>
								<li>
									<a id = 'our_vision' href="{{url()}}\pages\our_vision">Our Vision & Values</a>
								</li>
								<li>
									<a id = 'the_team' href="{{url()}}\pages\the_team">The Team</a>
								</li>
								<li>
									<a id = 'school_tieups' href="{{url()}}\pages\school_tieups">School Tie-ups</a>
								</li>
								<li>
									<a id = 'Montessori' href="{{url()}}\pages\Montessori">Montessori</a>
								</li>


							</ul>
							<!-- //nav-second-level -->
						</li>

						<li>
							<a href="#" id="programs"><i class="fa fa-user nav_icon"></i>Programs Pages<span class="nav-badge">3</span><span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a id = 'toddlerMontessori' href="{{url()}}\programs\toddlerMontessori">Toddler Montessori</a>
								</li>
								<li>
									<a id = 'primaryMontessori' href="{{url()}}\programs\primaryMontessori">Primary Montessori</a>
								</li>
								<li>
									<a id = 'schoolCare_Activity' href="{{url()}}\programs\schoolCare_Activity">School Care & Activity</a>
								</li>								
							</ul>
							<!-- //nav-second-level -->
						</li>


                          

						<li>
							<a href="#" id="contact_us"><i class="fa fa-user nav_icon"></i>Contact Us Pages<span class="nav-badge">2</span><span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a id = 'enquiry' href="{{url()}}\contact_us\enquiry">Enquiry</a>
								</li>
								<li>
									<a id = 'career' href="{{url()}}\contact_us\career">Career</a>
								</li>
							</ul>
							<!-- //nav-second-level -->
						</li>
                                                <!--
						<li>
							<a href="tables.html"><i class="fa fa-table nav_icon"></i>Tables <span class="nav-badge">05</span></a>
						</li>
                                                -->
                                        </ul>
					<!-- //sidebar-collapse -->
				</nav>
                </div>
            </div>
		<!--left-fixed -navigation-->

        @show
        @section('header')
            <!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<!--logo -->
				<div class="logo">
					<a href="{{url()}}/dashboard">
						<h1>Floretz</h1>
						<span>AdminPanel</span>
					</a>
				</div>
				<!--//logo-->
				<!--search-box-->
				<div class="search-box">
					<form class="input">
						<input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" />
						<label class="input__label" for="input-31">
							<svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
								<path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
							</svg>
						</label>
					</form>
				</div><!--//end-search-box-->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
					
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
                                                                    <span class="prfil-img"><div class="fa fa-user fa-2x"></div> </span> 
									<div class="user-name">
										<p>{{$admin_name}}</p>
										<span>Administrator</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="{{url()}}/dashboard/logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
              @show
              @section('mainsub')
              @show
              <!--footer-->
              <div class="footer" style="">
                    
		   <p>&copy; 2016 Floretz Admin Panel. All Rights Reserved</p>
                   
                </div>
        <!--//footer-->
             
              
</div>
     @yield('JS')
    <!-- Classie -->
		<script src="{{url()}}/assets/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="{{url()}}/assets/js/jquery.nicescroll.js"></script>
	<script src="{{url()}}/assets/js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="{{url()}}/assets/js/bootstrap.js"> </script>
  
   <script>
    $( document ).ready(function() {
        //alert('{{$mainpage}}');
        $('#{{$mainpage}}').addClass('active');
    }); 
   </script>
       </body>
</html>